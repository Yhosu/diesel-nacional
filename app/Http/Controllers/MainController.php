<?php

namespace App\Http\Controllers;

class MainController extends Controller
{

  	public function showHome() {
		return view('content.home');
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
}
