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
//on '/' route to welcome, this is  a get request
//the react/vue code will go inside resources->js

 
Route::get('/orders',"orders@getOrders");
Route::get('/columns',"columns@getColumns");
Route::get('/blotter',"PagesController@blotter");

 