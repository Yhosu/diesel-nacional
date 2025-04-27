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
		$categories   	 = \App\Models\Category::where('active', 1)->orderBy('order', 'ASC')->get();
		$menu1 			 = \App\Models\Menu::with('menu_items')->whereHas('category', function($q){ $q->where('code', 'barra-diesel'); })->orderBy('order', 'ASC')->limit(2)->get();
		$menu2 			 = \App\Models\Menu::with('menu_items')->whereHas('category', function($q){ $q->where('code', 'the-resto-diesel'); })->orderBy('order', 'ASC')->limit(2)->get()->merge($menu1);
		$menus 			 = \App\Models\Menu::with('menu_items')->whereHas('category', function($q){ $q->where('code', 'diesel-bar-menu'); })->orderBy('order', 'ASC')->limit(2)->get()->merge($menu2);
		$characteristics = \App\Models\Characteristic::where('active', 1)->orderBy('order', 'ASC')->get();
		$events			 = \App\Models\Event::where('active', 1)->orderBy('order', 'ASC')->get();
		$now 			 = date('ymd');
		$reviews 		 = \Cache::store('database')->remember($now, 86400, function() {
            $responseSpanish = \Http::get(config('services.tripadvisor.url').'/' . config('services.tripadvisor.merchant_id') . '/reviews?language=es&limit=10&key=' . config('services.tripadvisor.api_key'))->json();
			$responseEnglish = \Http::get(config('services.tripadvisor.url').'/' . config('services.tripadvisor.merchant_id') . '/reviews?language=en&limit=10&key=' . config('services.tripadvisor.api_key'))->json();
			$result = array_merge($responseSpanish['data'],$responseEnglish['data']);
			shuffle($result);
			return $result;
        });
		shuffle($reviews);
		$mainEventImage 	   = \App\Models\Event::where('active', 1)->where('showBanner', 1)->first()->image ?? null;
		$scheduleText   	   = \App\Models\Parameter::where('code', 'schedule-text')->first()->value;
		$scheduleTextSecondary = \App\Models\Parameter::where('code', 'schedule-text-secondary')->first()->value;
		$galleryTitle 		   = \App\Models\Parameter::where('code', 'gallery-title')->first()->value;
		$gallerySubtitle       = \App\Models\Parameter::where('code', 'gallery-subtitle')->first()->value;
		$dieselBarImages	   = array_filter(scandir(public_path('assets/img/diesel-bar')), function($item) {
			return $item[0] !== '.';
		});
		return view('content.home', compact(
			'bannerInit', 
			'about', 
			'schedules', 
			'menus', 
			'characteristics', 
			'events', 
			'reviews', 
			'mainEventImage', 
			'categories', 
			'scheduleText', 
			'scheduleTextSecondary', 
			'galleryTitle', 
			'gallerySubtitle',
			'dieselBarImages'
		));
	}

  	public function showMenu( $code ) {
		$category = \App\Models\Category::where('code', $code)->firstOrFail();
		return view('content.menu', compact('category'));
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
		$noRestricts = ['xt_with_image'];
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
            if( !\Schema::hasColumn($table, trim( strtolower( $key ) ) ) && !in_array($key, $noRestricts) ) continue;
            if( empty( $value ) ) continue;
            $type = \Str::contains( $key, 'xt_') ? 'extra' : getTypeField($table, $key);
            $items = $items->when( \Str::contains( $key, 'xt_with_image'), function( $q ) use( $key, $value ) {
					return $q->whereNotNull('image');
				})->when( in_array( $type, ['int', 'bigint', 'tinyint', 'enum']), function( $q ) use( $key, $value ) {
                    return $q->where( $key, $value );
                })->when( in_array($type, ['text', 'string', 'varchar'] ), function( $q ) use( $key, $value ) {
					$isUuid = preg_match('/^[a-f\d]{8}(-[a-f\d]{4}){4}[a-f\d]{8}$/i', $value);
					if( $isUuid ) return $q->where( $key, $value );
                    $query = "TRIM( REPLACE( REPLACE(  REPLACE( REPLACE( REPLACE( LOWER( `" . $key . "`), 'á', 'a' ), 'e', 'e' ), 'i', 'i' ), 'ó', 'o' ), 'u', 'u' ) ) LIKE '%" . clean4search( $value ) ."%'";
					return $q->whereRaw($query, []);
                })->when( in_array( $type, ['datetime', 'date', 'timestamp'] ) && isset($filters[$key.'_from']) && isset( $filters[$key.'_to'] ) , function( $q ) use( $key, $value, $filters ) {
                    return $q->whereDate($key, '>=',$filters[$key.'_from'] . ' 00:00:00')->whereDate($key, '<=', $filters[$key.'_to'] . ' 23:59:00');
                });
        }
        $items = $paginate
            ? $items->orderBy('created_at', 'DESC')->paginate( config('nodes.paginate') )->appends( $request->all() ) 
            : $items->orderBy('created_at', 'DESC')->get();
		$result = [
			'title'   	=> __('diesel.list.' . $node ),
			'filters' 	=> \Func::getFilters( $table, $lang ),
			'fields'  	=> $fields,
			'items'   	=> $items,
			'node_name'	=> $node,
		];
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
		return view('livewire.pages.admin.form-crud', $result);
	}
}
