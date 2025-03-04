<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProcessController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {
    return redirect('/home');
});

Route::get('/test-queries', function () {
    $menu = \App\Models\Menu::first();
    App::setLocale('en');
    $menu->name = 'newww';
    $menu->save();
    echo $menu->name;
});

Route::get('/home',                                  [MainController::class, 'showHome'])->name('home');
Route::get('/menu',                                  [MainController::class, 'showMenu'])->name('menu');
Route::get('/about-us',                              [MainController::class, 'showAbout']);
Route::get('/contact',                               [MainController::class, 'showContact']);
Route::get('/blog',                                  [MainController::class, 'showBlog']);
Route::post('/post-contact-form',                    [ProcessController::class, 'postContactForm'])->name('contact-form');
Route::get('/logout',                                [MainController::class, 'findLogout']);
Route::get('/change-locale/{lang}',                  [MainController::class, 'changeLocale'])->name('language');
Route::get('/dashboard',                             [MainController::class, 'findDashboard'])->name('dashboard');
Route::get('/test-nodes/{id?}',                      [MainController::class, 'findTestNodes']);
    /* LISTADOS Y CRUDS */
Route::get('/node-list/{node}/{paginate?}/{excel?}', [MainController::class,    'getNodeList']);
Route::get('/node/{node}/{action}/{id?}',            [MainController::class,    'getNodeAction']);
Route::post('/node/{node}',                          [ProcessController::class, 'postNodeAction']);

Auth::routes();
