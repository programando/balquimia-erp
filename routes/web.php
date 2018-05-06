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


Route::get('/', function () {
    return view('adminLayout.adminMain');
});
*/


/** LOGIN */
/*-----------------*/
Route::get('login'  , 'LoginController@ShowLogin')->name('login.show');
Route::post('login' , 'LoginController@PostLogin')->name('login');
Route::get('logout' , 'LoginController@getLogOut')->name('cerrar-sistema');


/** PASSWORD RESET */
/*-----------------*/
Route::get('reset-password'           , 'LoginController@RememberPasswordShowForm')->name('password.reset.show.form');
Route::post('reset-password'          , 'LoginController@ResetPasswordSendMail')->name('reset-password');
Route::get('update-password/{token}'  , 'LoginController@UpdatePasswordShowForm')->name('update-password');
Route::post('update-password'         , 'LoginController@UpdatePassword')->name('update-password');



Route::middleware(['auth'])->group(function () {

    Route::get('/', 'DashBoardController@Index')->name('dashboad');

    Route::get('unidades-medidas', 'PrdUnidadesMedida@showForm')->name('prod-undmed-show-form');
    Route::resource('medidas', 'PrdUnidadesMedida', ['except'=>'edit','create']);

});


