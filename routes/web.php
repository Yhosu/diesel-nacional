<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProcessController;
use Illuminate\Support\Facades\Http;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {
    return redirect('/home');
});

Route::get('/test-queries', function () {
    vardump( \Func::getFilters( 'menu_items', 'es') );
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


Route::middleware(['auth'])->prefix('admin')->group(function() {
    Route::get('/', function() {
        return redirect('/admin/account');
    });
    Route::view('dashboard', 'content.admin.dashboard')->name('dashboard');
    Route::view('account', 'content.admin.account')->name('admin-account');
    
    // Route::prefix('node/{node}')->group(function () {
    //     Route::get('/', [MainController::class, 'showNodeTableCrud'])->name('table-crud');
    //     Route::get('{action}', [MainController::class, 'showNodeFormCrud'])->where('action', 'create')->name('form-crud');
    //     Route::get('{action}/{id}', [MainController::class, 'showNodeFormCrud'])->where('action', 'read|edit')->name('form-crud');
    // });

    /* LISTADOS Y CRUDS */
    Route::get('/node-list/{node}/{paginate?}/{excel?}',    [MainController::class,    'getNodeList']);
    Route::get('/node/{node}/{action}',                     [MainController::class,    'getNodeAction'])->where('action', 'create')->name('form-crud');
    Route::get('/node/{node}/{action}/{id}',                [MainController::class,    'getNodeAction'])->where('action', 'read|edit|delete')->name('form-crud');
    Route::post('/node/{node}',                             [ProcessController::class, 'postNodeAction']);
});

Route::group(['prefix'=>'auth'], function(){
    Route::get('/', function() {
        return redirect('/auth/login');
    });
});

Auth::routes();

require __DIR__.'/auth.php';