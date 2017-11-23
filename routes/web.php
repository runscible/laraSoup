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

Route::get('/getSoup', function(){
    if(Request::ajax()){
        return 'anda hasta acá :D'; 
    }
}); 

Route::post('/postSoup', 'soupController@post_soup'); 

Route::post('/getResults', 'soupController@getResults'); 