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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Auth::routes();

Route::get('/home', 'TecnicoController@all')->name('home');

Route::get('/testeTecnicos','TecnicoController@tecnicoAvaliable')->name('listTecnicos');
Route::get('/changeStatus/{id}/{status}','TecnicoController@changeStatus')->name('changeStatus');
//Route::get('/changeLocation/{id}/{location}','TecnicoController@changeLocation')->name('changeLocation');

/*
 * Manage Tecnico
 */
Route::get('/newTecnico','TecnicoController@storeNewTecnicoForm')->name('newTecnico');
Route::post('/newTecnico','TecnicoController@storeNewTecnico')->name('newTecnico');

Route::get('/editTecnico/{id}','TecnicoController@editTecnicoForm')->name('editTecnico');
Route::post('/editTecnico/','TecnicoController@editTecnico')->name('editTecnico');

Route::get('/changeLocation/{id}','TecnicoController@changeLocationForm')->name('changeLocation');
Route::post('/changeLocation','TecnicoController@changeLocation')->name('changeLocation');

Route::get('/changeStatus','TecnicoController@changeStatusForm')->name('changeStatus');
Route::post('/changeStatus','TecnicoController@changeStatus')->name('changeStatus');

Route::get('/IsAvaliable','TecnicoController@showWhoIsAvaliable')->name('showWhoIsAvaliable');

Route::get('/newsRead/{id}','TecnicoController@newsRead')->name('newsRead');



/*
 * New
 */
Route::get('/new/{id}','NewController@openNewTecnico')->name('openNewTecnico');
Route::get('/createNew/','NewController@createNewForm')->name('createNew');
Route::post('/createNew/','NewController@createNew')->name('createNew');

Route::get('/editNew/{id}','NewController@editNewForm')->name('editNew');
Route::post('/editNew/','NewController@editNew')->name('editNew');

Route::get('/deleteNew/','NewController@deleteNewForm')->name('deleteNew');
Route::post('/deleteNew/','NewController@deleteNew')->name('deleteNew');

Route::get('/homeNews','HomeController@index')->name('showAllNews');


/*
 * Location
 */

Route::get('/createLocation/','LocationController@createLocationForm')->name('createLocation');
Route::post('/createLocation/','LocationController@createLocation')->name('createLocation');

Route::get('/editLocation/{id}','LocationController@editLocationForm')->name('editLocation');
Route::post('/editLocation/','LocationController@editLocation')->name('editLocation');


Route::get('/deleteLocation/','LocationController@deleteLocationForm')->name('deleteLocation');
Route::post('/deleteLocation/','LocationController@deleteLocation')->name('deleteLocation');


Route::get('/tecnicosLocation/{id}','LocationController@whoIsOnLocation')->name('whoIsOnLocation');
Route::get('/adminPainel','HomeController@supervisorAdmin')->name('supervisorAdmin');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();


});