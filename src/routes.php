<?php



Route::group(['namespace'=>'Winchester\HdLogger\Http\Controllers'], function (){
    Route::prefix('hd-logger')->group(function (){
        Route::get('/',['as'=>'hd.logger.view.logs', 'uses' => 'HdLoggerController@viewLogs']);
    });
});
