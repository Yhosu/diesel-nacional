<?php

namespace App\Http\Controllers;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
	protected $url;

	public function __construct(UrlGenerator $url) {
		$this->prev = $url->previous();
	}

    public function postContactForm( Request $request ) {
        $form = new \App\Models\Form;
        $form->name     = $request->name;
        $form->email    = $request->email;
        $form->phone    = $request->phone;
        $form->subject  = $request->subject;
        $form->comments = $request->comments;
        $form->save();
        return redirect($this->prev)->with('message_success', __('diesel.form_success'));
    }

    public function postNodeAction( Request $request ) {
        $action = $request->action;
        $node = $request->node;
        if( !in_array( $action, ['create', 'edit'] ) ) return redirect($this->prev);
        $className = \Func::getModel( $node );
        $rules     = (new $className)::${'rules_'.$action};
        $validator = \Validator::make( $request->all(), $rules );
        $redirect  = '';
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            session()->flash('message_error', (__('diesel.empty_parameters') ?? trans('responses.error.default')));
        }
        $message = '';
        if ($action == 'create') {
            $item = new $className;
            $item->created_at = date('Y-m-d H:i:s');
            $item->save();
            $message = __('diesel.item_created');
            $redirect = url(sprintf('admin/node/%s/edit/%s', $node, $item->id));
        } elseif ($action == 'edit') {
            $item = $className::find($request->id);
            $message = __('diesel.item_edited');
            $redirect = url(sprintf('admin/node/%s/edit/%s', $node, $item->id));
        }
        $params = $request->all();
        unset($params['id'],$params['node'],$params['action'],$params['_token']);
        foreach ($params as $key => $value) {
            if( \Str::contains( $key, 'image' ) && !empty( $request->hasFile($key) ) && \Func::validateImageUrl( $value, $node . '-' . $key, $value, $item->$key ) ) {
                $item->$key = \Asset::upload_image($request->file($key), $node . '-' . $key);
            } elseif( \Str::contains( $key, 'file' ) && !empty( $request->hasFile($key) ) && \Func::validateFileUrl( $value, $node . '-' . $key, $value, $item->$key ) ) {
                $item->$key = \Asset::upload_file($request->file($key), $node . '-' . $key);
            } else {
                $item->$key = $value;
            }
        }
        $item->save();
        return redirect($redirect)->with('message_success', __('diesel.action_successfully'));
    }

    public function findLoadMoreProducts( Request $request ) {
        $category = $request->category;
        $menuItems = \App\Models\MenuItem::whereHas('menu', function($q) use($category) {
            $q->where('categoryId', $category);
        })->whereNotNull('image')->orderBy('order')->paginate(config('nodes.per_page_front'), ['*'], 'page', $request->page);
        $html = $menuItems->count() > 0 ? view('includes.menu-items', ['menuItems'=>$menuItems, 'page'=>$request->page ])->render() : '';
        return [ 'status' => true, 'html' => $html ];
	}    
}
