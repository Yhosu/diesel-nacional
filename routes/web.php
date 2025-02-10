<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {
    return redirect('/home');
});

Route::get('/home', [MainController::class, 'showHome']);
Route::get('/menu', [MainController::class, 'showMenu']);
Route::get('/about-us', [MainController::class, 'showAbout']);
Route::get('/contact', [MainController::class, 'showContact']);
Route::get('/blog', [MainController::class, 'showBlog']);