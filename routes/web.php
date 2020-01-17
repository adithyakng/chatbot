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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/hello', function () {
    return view('hello');
});

Route::post('ajaxRequest','TestController@ajaxRequestPost');
Route::get('ajaxRequest','TestController@ajaxRequestGet');

Route::post('chatbotRequest','ChatbotController@chatbotRequestPost');
Route::get('chatbotRequest','ChatbotController@chatbotRequestGet');

Route::post('chatbotHistory','ChatbotController@chatbotHistoryRequestPost');


Route::get('add','LoginController@create');
Route::post('add','LoginController@store');
Route::get('login','LoginController@index');
Route::get('edit/{id}','LoginController@edit');
Route::post('edit/{id}','LoginController@update');
Route::delete('{id}','LoginController@destroy');

Route::post('addRegister','RegisterController@store');


Route::get('/',function(){
    return view('login_add');
});

Route::get('/register',function(){
    return view('register');
});

Route::get('/chatbot',function()
{
    return view('chatbot_page');
});