<?php

namespace App\Http\Controllers;

class MainController extends Controller
{

  	public function showHome() {
		return view('content.home');
	}
}
