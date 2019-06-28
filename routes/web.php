<?php

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

use App\Events\pusherEvent;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/auth/logout', 'Auth\LoginController@logout')->name('logout');


/*
 * Manage Tecnico
 */
Route::get('/newTecnico','TecnicoController@storeNewTecnicoForm')->name('newTecnico');
Route::post('/newTecnico','TecnicoController@storeNewTecnico')->name('newTecnico');

Route::get('/editTecnico/{id}','TecnicoController@editTecnicoForm')->name('editTecnico');
Route::post('/editTecnico/','TecnicoController@editTecnico')->name('editTecnico');


Route::get('/changeStatus','TecnicoController@changeStatusForm')->name('changeStatus');
Route::post('/changeStatus','TecnicoController@changeStatus')->name('changeStatus');

Route::get('/IsAvaliable','HomeController@showWhoIsAvaliable')->name('showWhoIsAvaliable');

Route::get('/newsRead/{id}','TecnicoController@newsRead')->name('newsRead');

Route::get('/iniciarAtendimento/{id}','AtendimentoController@iniciarAtendimentoForm')->name('iniciarAtendimento');
Route::post('/iniciarAtendimento/','AtendimentoController@iniciarAtendimento')->name('changeLocation');
Route::get('/encerrarAtendimento/{idAtendimento}','AtendimentoController@encerraAtendimento')->name('encerraAtendimento');


Route::get('/openTecnico/{id}','TecnicoController@viewTecnico')->name('abrirTecnicoProfile');


/*
 * HD
 */
Route::get('/hd','HardDriveController@listarHD')->name('listarHD')->middleware(IsAdmin::class);
Route::get('/receberHd/{id}','HardDriveController@receberHD')->name('receberHD')->middleware(IsAdmin::class);


/*
 * New
 */
Route::get('/new/{id}','NewController@openNewTecnico')->name('openNewTecnico');
Route::get('/manageNews','NewController@manageNews')->name('manageNews')->middleware(IsAdmin::class);
Route::get('/createNew/','NewController@createNewForm')->name('createNew')->middleware(IsAdmin::class);
Route::post('/createNew/','NewController@createNew')->name('createNew')->middleware(IsAdmin::class);

Route::get('/editNew/{id}','NewController@editNewForm')->name('editNew')->middleware(IsAdmin::class);
Route::post('/editNew/','NewController@editNew')->name('editNew')->middleware(IsAdmin::class);

Route::delete('/deleteNew/{id}','NewController@deleteNew')->name('deleteNew')->middleware(IsAdmin::class);
//Route::post('/deleteNew/','NewController@deleteNew')->name('deleteNew');

Route::get('/homeNews','HomeController@index')->name('showAllNews');
Route::get('/homeNewsNaoLido','HomeController@index')->name('indexNaoLido');
Route::get('/news/whoRead/{id}','NewController@noRead')->name('whoRead')->middleware(IsAdmin::class);


/*
 * Location
 */

Route::get('/createLocation/','LocationController@createLocationForm')->name('createLocation')->middleware(IsAdmin::class);
Route::post('/createLocation/','LocationController@createLocation')->name('createLocation')->middleware(IsAdmin::class);

Route::get('/editLocation/{id}','LocationController@editLocationForm')->name('editLocation')->middleware(IsAdmin::class);
Route::post('/editLocation/','LocationController@editLocation')->name('editLocation')->middleware(IsAdmin::class);


Route::get('/deleteLocation/','LocationController@deleteLocationForm')->name('deleteLocation')->middleware(IsAdmin::class);
Route::post('/deleteLocation/','LocationController@deleteLocation')->name('deleteLocation')->middleware(IsAdmin::class);


Route::get('/tecnicosLocation/{id}','LocationController@whoIsOnLocation')->name('whoIsOnLocation')->middleware(IsAdmin::class);
Route::get('/adminPainel','HomeController@supervisorAdmin')->name('supervisorAdmin')->middleware(IsAdmin::class);

/*
 *  Atendimento
 */

Route::get('/tempoTotal','AtendimentoController@tempoPorTecnicoPorcentagem')->name('tempoTotal');

Route::get('/mapa','HomeController@exibirMapa')->name('exibirMapa')->middleware(IsAdmin::class);

/*
 * Testes
 */

//Route::get('/testeId',function (){
//   return view('testeId');
//});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();



});