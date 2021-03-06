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


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

//Rutas que se ven cuando estas logeado
Route::group(['middleware' => 'auth'], function(){

    //Create
    Route::get('/questions/create','QuestionsController@create')->name("crearPregunta");
    Route::post('/questions/create', 'QuestionsController@store');
    Route::post('/questions/{slug}/comments', 'CommentsController@store');

    //Read
    Route::get('/questions/load_data','QuestionsController@cargarDatos');
    Route::get('/questions/obtenerDatos', 'QuestionsController@obtenerDatosAjax');
    Route::post('/questions/obtenerCadaDato', 'QuestionsController@obtenerDatosAjaxCadaUno');
    Route::post('/questions/vistaPregunta','QuestionsController@cargarVista');
    Route::get('/questions/{question}', 'QuestionsController@show');

    //Update
    Route::get('/questions/edit/{slug}', 'QuestionsController@edit');
    Route::get('/questions/update/{slug}', 'QuestionsController@update');

    //Delete
    Route::delete('/questions/destroy/{id}', 'QuestionsController@destroy')->name("deleteElement");

    //Profile
    Route::get('/user/{user}', 'UserController@show')->name("profile");
    Route::get ('/user/edit/{user}', 'UserController@edit')->name("settings");
});

    Route::post('/questions/validate','QuestionsController@validarAjax');
    Route::get('/questions','QuestionsController@show');


