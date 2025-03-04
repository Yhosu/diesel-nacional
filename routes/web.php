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

    $context = stream_context_create([
        "http" => [
            "method" => "GET",
            "header" => "Accept-languange: es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3\r\n" .
            "Cookie: TADCID=e-1AsVmXywKniWxWABQCJ4S5rDsRRMescG99HippfoN5ZYhZT8HBr-QWxhyXTiy0enHgC6cxXaoYnd65hzFnLGUqaQCV3ez70og; TASameSite=1; TAUnique=%1%enc%3ACjxjjgRYHomNJgxKMEeQEH%2Fcu%2Fam6IauZ%2BW4iNEPTeXFk%2B6CdZLeRN%2FIKjVt89xgNox8JbUSTxk%3D; datadome=DXC1Se6moJkJ0hTwRGIzU_BQUTUiZsMBKBoQyqroQBH14Ti41iBolQoFBP~~cHacuV3gmLMWdM1TvVUc~y_stvALBoAUmAIwLfZBnXvLKBH2W6kQEagW487dIPK5msta; TASSK=enc%3AAAtajhkvs1AJ3dObcAfjN%2BpN6NvNmFvBCH9VnfUDpz9pprkFLOttEZh3FLlWIep4ipdfIZFSfImGyPiFIu0tyPkHmbV194QMNU4Amj7Nty%2Fk2lj3%2F%2BYGNuQdFwu…0vb4BY06Pcw; TASession=V2ID.38CC38608E9813CD577861C2E68E5A7E*SQ.2*LS.Restaurant_Review*HS.recommended*ES.popularity*DS.5*SAS.popularity*FPS.oldFirst*FA.1*DF.0*TRA.true; SRT=TART_SYNC; TART=%1%enc%3A%2FYNt47pKGCBs1%2FLjAd4DHSOdZU8VFLi8XHVZNr%2FEbV4HpyhuZHLnD1bhfgyVX1mP3Fl6nYPjOm4%3D; _li_dcdm_c=.tripadvisor.es; _lc2_fpi=684343b8f00b--01jcgpxtt8q5b7t3fnzvrtzyke; _lc2_fpi_meta=%7B%22w%22%3A1731432737608%7D; _lr_retry_request=true; pbjs_li_nonid=%7B%7D; pbjs_li_nonid_cst=zix7LPQsHA%3D%3D; _lr_sampling_rate=100\r\n" .
            "Host: www.tripadvisor.es\r\n" . 
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\r\n" . 
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:135.0) Gecko/20100101 Firefox/135.0\r\n"
        ]   
    ]);
    $response = Http::get('https://www.tripadvisor.es/Restaurant_Review-g294072-d3645897-Reviews-Diesel_Nacional-La_Paz_La_Paz_Department.html');
    vardump($response);
    die();
    $content = @file_get_contents('https://www.tripadvisor.es/Restaurant_Review-g294072-d3645897-Reviews-Diesel_Nacional-La_Paz_La_Paz_Department.html#REVIEWS', false, $context);
    vardump( $content );
    die();
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
