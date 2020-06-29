<?php
/**
 * 写路由就完事了，规则同laravel
 */

Route::get('/v1/getinfo','IndexController@test');
Route::get('/v2/getinfo','IndexController@index');
Route::get('/v3/getinfo','IndexController@index');
Route::get('/v1/get','VideoController@index');
Route::get('/v2/get','VideoController@test');