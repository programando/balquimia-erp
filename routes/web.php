<?php

Route::get('prueba', 'MstroLineasController@prueba');

/*-----------------*/
/** LOGIN */
/*-----------------*/
Route::get('login'  , 'LoginController@ShowLogin')->name('login.show');
Route::post('login' , 'LoginController@PostLogin')->name('login');
Route::get('logout' , 'LoginController@getLogOut')->name('cerrar-sistema');
/*-----------------*/
/** PASSWORD RESET */
/*-----------------*/
Route::get('reset-password'           , 'LoginController@RememberPasswordShowForm')->name('password.reset.show.form');
Route::post('reset-password'          , 'LoginController@ResetPasswordSendMail')->name('reset-password');
Route::get('update-password/{token}'  , 'LoginController@UpdatePasswordShowForm')->name('update-password');
Route::post('update-password'         , 'LoginController@UpdatePassword')->name('update-password');


Route::middleware(['VerifyAutenticationAndRequestJson'])->group(function () {
    Route::resource('cargos',       'MstroCargosController',       ['except'=>'edit','create']);
    Route::resource('lineas',       'MstroLineasController',       ['except'=>'edit','create']);
    Route::resource('sublineas',     'MstroLineasController',      ['except'=>'edit','create']);
    Route::resource('medidas',      'MstroUndsMedidaController',   ['except'=>'edit','create']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/{any?}',                'DashBoardController@Index')->name('dashboad')->where('any','.*');
});



