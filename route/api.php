<?php
/**
 * 写路由就完事了，规则同laravel
 */

Route::get('/v1/getinfo','IndexController@test');
Route::get('/v2/getinfo','IndexController@index');
Route::get('/v3/getinfo','IndexController@index');
//Route::get('/v1/video/dianying/type','VideoController@dianyingType');

Route::get('/v1/video/dianying/year','VideoController@dianyingYear');
Route::get('/v1/video/dianying/star','VideoController@dianyingStar');
Route::get('/v1/video/dianying/country','VideoController@dianyingCountry');
Route::get('/v1/video/dianying/type','VideoController@dianyingType');
//Route::get('/v2/get','VideoController@test');