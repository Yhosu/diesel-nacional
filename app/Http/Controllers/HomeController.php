<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bannerInit 	 = \App\Models\Information::where('code', 'banner-init')->first();
		$about 	    	 = \App\Models\About::where('number', 1)->first();
		$schedules  	 = \App\Models\Schedule::where('active', 1)->orderBy('order', 'ASC')->get();
		$category   	 = \App\Models\Category::with('menus')->where('order', 1)->first();
		$characteristics = \App\Models\Characteristic::where('active', 1)->orderBy('order', 'ASC')->get();
		$events			 = \App\Models\Event::where('active', 1)->orderBy('order', 'ASC')->get();
		$reviews    	 = \App\Models\Review::get();
		return view('content.home', compact('bannerInit', 'about', 'schedules', 'category', 'characteristics', 'events', 'reviews'));
    }
}
