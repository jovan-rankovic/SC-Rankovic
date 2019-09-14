<?php

Route::namespace('Core')->group(function () {
    Route::get('/', 'FrontendController@home');
    Route::post('/contact', 'FrontendController@contact');
    Route::get('/sessions', 'FrontendController@sessions');
});


Route::namespace('Resource')->group(function () {
    Route::get('/posts/pagination', 'PostController@pagination');
    Route::get('/trainings/pagination', 'TrainingController@pagination');
});


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'Core\BackendController@admin');
    Route::get('/arrivals', 'Resource\ArrivalController@index');
    Route::get('/payments', 'Resource\PaymentController@index');
});


Route::namespace('MyAuth')->group(function () {
    Route::post('/login', 'LoginController@login');
    Route::get('/logout', 'LoginController@logout');
});


Route::group(['namespace' => 'MyAuth', 'prefix' => 'register'], function () {
    Route::post('/', 'RegisterController@register');
    Route::get('/{remember_token}', 'RegisterController@activate');
});


Route::group(['namespace' => 'Resource', 'prefix' => 'posts'], function () {
    Route::get('/{post}', 'PostController@show');
    Route::resource('{post}/comments', 'CommentController')->except(['show', 'index', 'create', 'edit'])->middleware('loggedIn');
});


Route::group(['namespace' => 'Resource', 'prefix' => 'trainings'], function () {
    Route::get('/{training}', 'TrainingController@show');
});


Route::group(['namespace' => 'Resource', 'prefix' => 'energijapp', 'middleware' => 'loggedIn'], function () {
    Route::get('/profile/{user}', 'UserController@show');
    Route::patch('/images/user/{user}', 'UserController@image_update');
    Route::get('/reservations/user/{id}', 'ReservationController@create');
});


Route::group(['namespace' => 'Resource', 'prefix' => 'energijapp', 'middleware' => 'privileged'], function () {
    Route::get('/users/create', 'UserController@create');
    Route::post('/users', 'UserController@store');
    Route::get('/users/{user}/edit', 'UserController@edit');
    Route::patch('/users/{user}', 'UserController@update');
    Route::get('/search', 'UserController@search');
    Route::get('/reservations', 'ReservationController@index');
    Route::get('/arrivals/create/payment/{id}', 'ArrivalController@create');
    Route::get('/arrivals/{id}/edit', 'ArrivalController@edit');
    Route::get('/payments/create/user/{id}', 'PaymentController@create');
    Route::get('/payments/{id}/edit', 'PaymentController@edit');
});


Route::group(['namespace' => 'Resource', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('/users', 'UserController')->except('show', 'store', 'update');
    Route::resource('/posts', 'PostController')->except('show');
    Route::resource('/sliders', 'SliderController')->except('show');
    Route::resource('/menus', 'MenuController')->except('show');
    Route::resource('/trainers', 'TrainerController')->except('show');
    Route::resource('/trainings', 'TrainingController')->except('show');
    Route::resource('/prices', 'PriceController')->except('show');
    Route::resource('/services', 'ServiceController')->except('show');
    Route::resource('/socials', 'SocialController')->except('show');
});


Route::fallback(function () {
    abort(404);
});
