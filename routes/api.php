<?php

Route::group(['namespace' => 'API', 'middleware' => 'loggedIn'], function () {
    Route::get('/arrivals/user/{id}', 'ArrivalController@getUserArrivals');
    Route::get('/payments/user/{id}/arrivals', 'PaymentController@getUserPaymentArrivals');
    Route::post('/reservations', 'ReservationController@store');
    Route::get('/reservations/count', 'ReservationController@getCount');
    Route::delete('/reservations/user/{id}', 'ReservationController@deleteUserReservations');
    Route::get('/trainings/reservable', 'TrainingController@getReservable');
    Route::get('/users/privilege', 'UserController@getPrivilege');
    Route::patch('/users/{id}/change_password', 'UserController@changePassword');
});

Route::group(['namespace' => 'API', 'middleware' => 'privileged'], function () {
    Route::get('/arrivals/{id}', 'ArrivalController@show');
    Route::post('/arrivals', 'ArrivalController@store');
    Route::patch('/arrivals/{id}', 'ArrivalController@update');
    Route::delete('/arrivals/{id}', 'ArrivalController@destroy');
    Route::get('/payments/{id}', 'PaymentController@show');
    Route::post('/payments', 'PaymentController@store');
    Route::patch('/payments/{id}', 'PaymentController@update');
    Route::delete('/payments/{id}', 'PaymentController@destroy');
    Route::get('/payments/user/{id}', 'PaymentController@getUserPayments');
    Route::get('/prices', 'PriceController@index');
    Route::delete('/reservations/{id}', 'ReservationController@destroy');
    Route::get('/reservations/date_search', 'ReservationController@dateSearch');
    Route::get('/trainings', 'TrainingController@index');
    Route::get('/trainers', 'TrainerController@index');
    Route::get('/users/card_number_search', 'UserController@cardNumberSearch');
    Route::get('/users/name_search', 'UserController@nameSearch');
});

Route::group(['namespace' => 'API', 'middleware' => 'admin'], function () {
    Route::get('/arrivals', 'ArrivalController@index');
    Route::get('/payments', 'PaymentController@index');
    Route::get('/users/operators', 'UserController@getOperators');
});

Route::fallback(function () {
    abort(404);
});
