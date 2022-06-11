<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KlentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resource('posts', KlentController::class);
Route::get('/', [AuthController::class,'login']);
Route::post('login-user', [AuthController::class,'loginuser'])->name('login-user');
Route::get('/glavninachal', [AuthController::class,'dashbord'])->middleware('isLog');
Route::get('/logaut', [AuthController::class,'logaut']);

Route::get('tavar_live', [KlentController::class, 'tavar_live'])->name('tavar_live');
Route::get('tavar2_live', [KlentController::class, 'tavar2_live'])->name('tavar2_live');
Route::get('live_adress', [KlentController::class, 'live_adress'])->name('live_adress');
Route::get('live_clent', [KlentController::class, 'live_clent'])->name('live_clent');
Route::get('index', [KlentController::class, 'index'])->name('index');
Route::get('indextip', [KlentController::class, 'indextip'])->name('indextip');
Route::post('store', [KlentController::class, 'store'])->name('store');
Route::get('show/{id}', [KlentController::class, 'show']);
Route::post('update', [KlentController::class, 'update'])->name('update');
Route::post('delete/{id}', [KlentController::class, 'destroy']);

Route::post('store2', [KlentController::class, 'store2'])->name('store2');
Route::post('store2tip', [KlentController::class, 'store2tip'])->name('store2tip');
Route::post('update2', [KlentController::class, 'update2'])->name('update2');
Route::get('show2/{id}', [KlentController::class, 'show2']);
Route::post('delete2/{id}', [KlentController::class, 'delete2']);
Route::get('edit3', [KlentController::class, 'edit3'])->name('edit3');

Route::post('store3', [KlentController::class, 'store3'])->name('store3');
Route::post('updates', [KlentController::class, 'updates'])->name('updates');
Route::get('edit4', [KlentController::class, 'edit4'])->name('edit4');
Route::post('delete3/{id}', [KlentController::class, 'delete3']);
Route::post('tiklash/{id}', [KlentController::class, 'tiklash']);
Route::post('deleetemnu/{id}', [KlentController::class, 'deleetemnu']);
Route::get('edit5', [KlentController::class, 'edit5'])->name('edit5');
Route::post('store4', [KlentController::class, 'store4'])->name('store4');

Route::get('adress', [KlentController::class, 'adress'])->name('adress');
Route::get('ombor', [KlentController::class, 'ombor'])->name('ombor');
Route::get('index2', [KlentController::class, 'index2'])->name('index2');

Route::post('pastavka', [KlentController::class, 'pastavka'])->name('pastavka');
Route::get('show3/{id}', [KlentController::class, 'show3']);
Route::post('pastavkaupdate', [KlentController::class, 'pastavkaupdate'])->name('pastavkaupdate');
Route::post('delete4/{id}', [KlentController::class, 'delete4']);

Route::get('clents', [KlentController::class, 'clents'])->name('clents');
Route::post('sazdat', [KlentController::class, 'sazdat'])->name('sazdat');
Route::post('belgila', [KlentController::class, 'belgila'])->name('belgila');
Route::get('kursm', [KlentController::class, 'kursm'])->name('kursm');
Route::get('belgi2', [KlentController::class, 'belgi2'])->name('belgi2');
Route::get('usdkurd2', [KlentController::class, 'usdkurd2'])->name('usdkurd2');
Route::get('/sotuv',[KlentController::class, 'sotuv'])->name('sotuv');
Route::get('/live_search',[KlentController::class, 'live_search'])->name('live_search');
Route::get('/sqladiskizapas',[KlentController::class, 'sqladiskizapas'])->name('sqladiskizapas');
Route::get('/sqladiskizapas2',[KlentController::class, 'sqladiskizapas2'])->name('sqladiskizapas2');
Route::get('/tbody3table',[KlentController::class, 'tbody3table'])->name('tbody3table');
Route::get('/tbody3table2',[KlentController::class, 'tbody3table2'])->name('tbody3table2');
Route::post('plus', [KlentController::class, 'plus'])->name('plus');
Route::post('minus', [KlentController::class, 'minus'])->name('minus');
Route::post('udalit', [KlentController::class, 'udalit'])->name('udalit');
Route::post('yangilash', [KlentController::class, 'yangilash'])->name('yangilash');
Route::post('tugle', [KlentController::class, 'tugle'])->name('tugle');
Route::get('rachot', [KlentController::class, 'rachot'])->name('rachot');
Route::post('oplata', [KlentController::class, 'oplata'])->name('oplata');
Route::post('zakazayt', [KlentController::class, 'zakazayt'])->name('zakazayt');

Route::post('data', [KlentController::class, 'data'])->name('data');
Route::get('tavar', [KlentController::class, 'tavar'])->name('tavar');
Route::get('tavar_tip', [KlentController::class, 'tavar_tip'])->name('tavar_tip');
Route::get('zzzz', [KlentController::class, 'zzzz'])->name('zzzz');
Route::get('zzzzcli', [KlentController::class, 'zzzzcli'])->name('zzzzcli');
Route::get('zzzzaaaa', [KlentController::class, 'zzzzaaaa'])->name('zzzzaaaa');
Route::get('tavarvse', [KlentController::class, 'tavarvse'])->name('tavarvse');
Route::get('zzzzclick', [KlentController::class, 'zzzzclick'])->name('zzzzclick');
Route::post('submitckicked', [KlentController::class, 'submitckicked'])->name('submitckicked');
Route::get('datasearche', [KlentController::class, 'datasearche'])->name('datasearche');
Route::post('search', [KlentController::class, 'search'])->name('search');
Route::get('clent2', [KlentController::class, 'clent2'])->name('clent2');
Route::post('vseclent', [KlentController::class, 'vseclent'])->name('vseclent');
Route::get('clent_tip', [KlentController::class, 'clent_tip'])->name('clent_tip');
Route::get('savdobirlamchi', [KlentController::class, 'savdobirlamchi'])->name('savdobirlamchi');
Route::get('clents2', [KlentController::class, 'clents2'])->name('clents2');
Route::post('clents3', [KlentController::class, 'clents3'])->name('clents3');
Route::post('brlamclient', [KlentController::class, 'brlamclient'])->name('brlamclient');

Route::get('prodacha', [KlentController::class, 'prodacha'])->name('prodacha');
Route::get('sqlad.php', [KlentController::class, 'sqladiski'])->name('sqlad.php');
Route::post('otkazish', [KlentController::class, 'otkazish'])->name('otkazish');
Route::get('malumotolish', [KlentController::class, 'malumotolish'])->name('malumotolish');
Route::post('plussqlad', [KlentController::class, 'plussqlad'])->name('plussqlad');
Route::post('minussqlad', [KlentController::class, 'minussqlad'])->name('minussqlad');
Route::post('udalitsqlad', [KlentController::class, 'udalitsqlad'])->name('udalitsqlad');
Route::get('yangilashsqlad', [KlentController::class, 'yangilashsqlad'])->name('yangilashsqlad');
Route::post('saqlashsqlad', [KlentController::class, 'saqlashsqlad'])->name('saqlashsqlad');
Route::post('tayyorsqlad', [KlentController::class, 'tayyorsqlad'])->name('tayyorsqlad');

