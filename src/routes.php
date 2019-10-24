<?php



Route::group(['namespace'=>'Winchester\HdLogger\Http\Controllers'], function (){
    Route::prefix('hd-logger')->group(function (){
        Route::get('/',['as'=>'hd.logger.view.logs', 'uses' => 'HdLoggerController@viewLogs']);
        Route::get('/clear/{id}',['as'=>'hd.logger.clear.log', 'uses' => 'HdLoggerController@clearSingleLog']);
        Route::get('/clear-all',['as'=>'hd.logger.clear.logs', 'uses' => 'HdLoggerController@clearAllLogs']);
    });
});
