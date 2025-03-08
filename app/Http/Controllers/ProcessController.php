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
            return [
                'status'  => false,
                'message' => __('diesel.empty_parameters'),
                'errors'  => $errors,
            ];
        }
        // if ( $validator->fails() ) return redirect($this->prev)->with('message_error', __('diesel.empty_parameters'))->withErrors($validator)->withInput();
        $message = '';
        if ($action == 'create') {
            $item = new $className;
            $item->created_at = date('Y-m-d H:i:s');
            $item->save();
            $message = __('diesel.item_created');
            $redirect = url(sprintf('node/%s/edit/%s', $node, $item->id));
        } elseif ($action == 'edit') {
            $item = $className::find($request->id);
            $message = __('diesel.item_edited');
            $redirect = url(sprintf('node/%s/edit/%s', $node, $item->id));
        }
        $params = $request->all();
        unset($params['id'],$params['node'],$params['action']);
        foreach ($params as $key => $value) {
            if($request->hasFile($key)) {
                \Log::info($request->name);
            }
            $item->$key = \Str::contains( $key, 'image' ) && !empty( $request->hasFile($key) ) &&  \Func::validateImageUrl( $value, $node . '-' . $key, $value, $item->$key ) 
                ? \Asset::upload_image($request->file($key), $node . '-' . $key)
                : $item->$key = $value;
        }
        $item->save();
        return [
            'status'  => true,
            'action'  => $action,
            'message' => __('diesel.action_successfully'),
            'item'    => $item
        ];
        // return redirect($redirect)->with('message_success', __('diesel.action_successfully'));
    }
}
