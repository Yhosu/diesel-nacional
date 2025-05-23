<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProcessController;
use Illuminate\Support\Facades\Http;

Route::get('/', function() {
    return redirect('/home');
});

Route::get('/test-queries', function () {
    vardump( \Func::getFilters( 'categories', 'es') );
});

Route::get('/home',                                  [MainController::class, 'showHome'])->name('home');
Route::get('/menu/{code}',                           [MainController::class, 'showMenu'])->name('menu');
Route::get('/about-us',                              [MainController::class, 'showAbout']);
Route::get('/contact',                               [MainController::class, 'showContact']);
Route::get('/blog',                                  [MainController::class, 'showBlog']);
Route::post('/post-contact-form',                    [ProcessController::class, 'postContactForm'])->name('contact-form');
Route::get('/logout',                                [MainController::class, 'findLogout']);
Route::get('/change-locale/{lang}',                  [MainController::class, 'changeLocale'])->name('language');
Route::get('/dashboard',                             [MainController::class, 'findDashboard']);
Route::post('/load-more-products',                   [ProcessController::class, 'findLoadMoreProducts']);
Route::get('/test-nodes/{id?}',                      [MainController::class, 'findTestNodes']);


Route::middleware(['auth'])->prefix('admin')->group(function() {
    Route::get('/', function() {
        return redirect('/admin/node-list/about');
    });
    Route::view('dashboard', 'content.admin.dashboard')->name('dashboard');
    Route::view('account', 'content.admin.account')->name('admin-account');

    /* LISTADOS Y CRUDS */
    Route::get('/node-list/{node}/{paginate?}/{excel?}',    [MainController::class,    'getNodeList']);
    Route::get('/node/{node}/{action}',                     [MainController::class,    'getNodeAction'])->where('action', 'create')->name('form-create');
    Route::get('/node/{node}/{action}/{id}',                [MainController::class,    'getNodeAction'])->where('action', 'read|edit|delete')->name('form-crud');
    Route::post('/node/{node}',                             [ProcessController::class, 'postNodeAction'])->name('form');
});

Route::group(['prefix'=>'auth'], function(){
    Route::get('/', function() {
        return redirect('/auth/login');
    });
});

Auth::routes();

require __DIR__.'/auth.php';