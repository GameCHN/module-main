<?php


Route::group(['prefix' => '', 'namespace' => 'YC\Main\Http\Controllers'], function () {
    Route::get('/', 'MainController@index');
    Route::any('{all?}', 'MainController@index')->where('all', '.+');
});

//YCMS::makeFunc('to_url', function () {
//    function to_url($url = '') {
//
//    }
//});



