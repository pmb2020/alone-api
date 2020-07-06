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

Route::get('/v1/video/dianshi/year','VideoController@dianshiYear');
Route::get('/v1/video/dianshi/star','VideoController@dianshiStar');
Route::get('/v1/video/dianshi/country','VideoController@dianshiCountry');
Route::get('/v1/video/dianshi/type','VideoController@dianshiType');

Route::get('/v1/video/zongyi/star','VideoController@zongyiStar');
Route::get('/v1/video/zongyi/country','VideoController@zongyiCountry');
Route::get('/v1/video/zongyi/type','VideoController@zongyiType');

Route::get('/v1/video/dianying/type/all','VideoController@dianyingTypeAll1');
Route::get('/v1/video/dianshi/type/all','VideoController@dianshiTypeAll1');
Route::get('/v1/video/zongyi/type/all','VideoController@zongyiTypeAll1');
Route::get('/v1/video/dongman/type/all','VideoController@dianshiList');

Route::get('/v1/video/dianshi/list','VideoController@dianshiList');
Route::get('/v1/video/dianying/list','VideoController@dianyingList');
Route::get('/v1/video/zongyi/list','VideoController@zongyiList');
Route::get('/v1/video/dongman/list','VideoController@dongmanList');
