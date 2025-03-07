<?php

namespace App\Http\Controllers;
use Illuminate\Routing\UrlGenerator;

class MainController extends Controller
{
	protected $url;

	public function __construct(UrlGenerator $url) {
		$this->prev = $url->previous();
	}

	public function changeLocale( $locale ) {
		\Session::put('locale', $locale);
		return redirect($this->prev);
	}

  	public function showHome() {
		$bannerInit 	 = \App\Models\Information::where('code', 'banner-init')->first();
		$about 	    	 = \App\Models\About::where('number', 1)->first();
		$schedules  	 = \App\Models\Schedule::where('active', 1)->orderBy('order', 'ASC')->get();
		$category   	 = \App\Models\Category::with('menus')->where('order', 1)->first();
		$characteristics = \App\Models\Characteristic::where('active', 1)->orderBy('order', 'ASC')->get();
		$events			 = \App\Models\Event::where('active', 1)->orderBy('order', 'ASC')->get();
		$reviews    	 = \App\Models\Review::get();
		return view('content.home', compact('bannerInit', 'about', 'schedules', 'category', 'characteristics', 'events', 'reviews'));
	}

  	public function showMenu() {
		return view('content.menu');
	}

  	public function showAbout() {
		return view('content.about-us');
	}

  	public function showContact() {
		return view('content.contact');
	}

  	public function showBlog() {
		return view('content.blog');
	}

	public function findLogout() {
		\Auth::logout();
		return redirect('home');
	}

	public function findDashboard() {
		$lists = config('nodes.available_nodes');
		$arrayOptions = [];
		foreach( $lists as $node) {
			$arrayOptions[] = [
				'label' => __('diesel.list.' . $node),
				'url' => url('node-list/' . $node),
			];
		}
		vardump($arrayOptions);
		die();
		return view('admin.dashboard');
	}

	public function findTestNodes( $id = null ) {
		$lang = \App::getLocale();
		$node = 'review';
		$nodes   = config('nodes.available_nodes');
        if( !in_array( $node, $nodes ) ) return response()->json([ 'status'  => false, 'message' => 'Nodo inexistente.', 'errors' => [] ], 200);
		$className = \Func::getModel( $node );
		$class 	   = with(new $className);
		$table     = $class->getTable();
		$titleNode = $class->getLang( $lang );
		$fields    = \Func::getColumns( $table, $lang );
		vardump( $fields );
	}

	public function getNodeList( $node, $paginate = true, $excel = false ) {
		$request = request();
        $availableNodes = config('nodes.available_nodes');
        if( !in_array( $node, $availableNodes ) ) return redirect($this->prev);
		$lang 	   = \App::getLocale();
		$className = \Func::getModel( $node );
		$class 	   = with(new $className);
		$table     = $class->getTable();
		$titleNode = $class->getLang( $lang );
		$fields    = \Func::getColumnsWithTimestamps( $table, $lang );
		$items     = $className::query();
        $filters   = $request->all();
        foreach( $filters as $key => $value ) {
            $key = str_replace('_from', '', $key);
            if( !\Schema::hasColumn($table_name, trim( strtolower( $key ) ) ) ) continue;
            if( empty( $value ) ) continue;
            $type = getTypeField($table_name, $key);
            $items = $items->when( in_array( $type, ['int', 'bigint', 'tinyint', 'enum']), function( $q ) use( $key, $value ) {
                    return $q->where( $key, $value );
                })->when( in_array($type, ['text', 'string', 'varchar'] ), function( $q ) use( $key, $value ) {
                    $query = "TRIM( REPLACE( REPLACE( REPLACE(  REPLACE( REPLACE( REPLACE( LOWER( `" . $key . "`), 'á', 'a' ), 'e', 'e' ), 'i', 'i' ), 'ó', 'o' ), 'u', 'u' ), ' ', '' ) ) LIKE '%" . $value ."%'";
                    return $q->whereRaw($query, []);
                })->when( in_array( $type, ['datetime', 'date', 'timestamp'] ) && isset($filters[$key.'_from']) && isset( $filters[$key.'_to'] ) , function( $q ) use( $key, $value, $filters ) {
                    return $q->whereDate($key, '>=',$filters[$key.'_from'])->whereDate($key, '<=', $filters[$key.'_to']);
                });
        }
        $items = $paginate
            ? $items->paginate( config('nodes.paginate') )->appends( $request->all() ) 
            : $items->get();
			/* Contiene toda la INFO para poder iterar en una tabla con paginación */
		$result = [
			'title'   	=> __('diesel.list.' . $node ),
			'filters' 	=> \Func::getFilters( $table, $lang ),
			'fields'  	=> $fields,
			'items'   	=> $items,
			'node_name'	=> $node,
		];
		// vardump($result);
		return view('livewire.pages.admin.table-crud', $result);
	}

	public function getNodeAction( $node, $action, $id = null ) {
		$request = request();
		$availableNodes = config('nodes.available_nodes');
		if( !in_array( $node, $availableNodes ) ) return redirect($this->prev);
		if( !in_array( $action, ['create', 'edit', 'read', 'delete'] ) ) return redirect($this->prev);
		$lang 	   = \App::getLocale();
		$className = \Func::getModel( $node );
		$class 	   = with(new $className);
		$table     = $class->getTable();
		$titleNode = $class->getLang( $lang );
		$fields    = \Func::getColumns( $table, $lang );
		$function  = sprintf('%sItem', $action);
			/* Mandamos la acción */
		$evalItem = \Func::$function( $class, $id );
		if( !$evalItem['process'] ) return redirect($this->prev)->with('message_error', $evalItem['message']);
			/* Contiene toda la INFO para poder dibujar un formulario y poblarlo en caso de editar o ver y eliminar */
		$result = [
			'title'   => $titleNode,
			'fields'  => $fields,
			'item'    => $evalItem['item'],
			'message' => $evalItem['message'],
			'id'      => $id,
			'action'  => $action,
			'node'	  => $node
		];
		$redirect = $evalItem['redirect'] ?? false;
		if( $redirect ) return redirect( 'admin/node-list/' . $node )->with('message_success', $evalItem['message']);
		// vardump( $result );
		// die();
		return view('livewire.pages.admin.form-crud', $result);
	}
}
