<?php


Route::group(['middleware' => ['web','auth:admins'], 'prefix' => 'admin', 'namespace' => 'Modules\Product\Http\Controllers'], function()
{
    Route::group(['prefix' => 'product'], function (){
        Route::get('/','AdminProductController@getListProduct')->name('get.list.product');
//        Route::get('/create','AdminProductController@create')->name('get.create.product');
//        Route::post('/create','AdminProductController@store')->name('post.create.product');

//        Route::get('/update/{id}','AdminProductController@edit')->name('get.edit.product');
//        Route::post('/update/{id}','AdminProductController@update')->name('post.edit.product');


        Route::post('/ajax/active/{id}','AdminProductController@active')->name('ajax.post.active.product');
        Route::post('/ajax/hot/{id}','AdminProductController@hot')->name('ajax.post.hot.product');
        Route::post('/ajax/preview/{id}','AdminProductController@previewProduct')->name('ajax.post.preview.product');
        Route::post('ajax/delete/{id}','AdminProductController@delete')->name('ajax.post.delete.product');

        Route::post('/ajax/import/{id}','AdminProductController@import')->name('ajax.post.import.product');
//        Route::group(['prefix' => 'attribute'], function(){
//            Route::get('/','AdminAttributeController@getListAttribute')->name('get.list.attribute');
//            Route::get('/create','AdminAttributeController@create')->name('get.create.attribute');
//            Route::post('/create','AdminAttributeController@store')->name('post.create.attribute');
//
//            //ajax
//            Route::get('/ajax/value/{id}','AdminAttributeController@getListValue')->name('ajax.get.list.value');
//        });
    });
    Route::group(['prefix' => 'productImport'], function (){
        Route::get('/','AdminProductController@getListProductImport')->name('get.list.productImport');
        Route::get('/create','AdminProductController@create')->name('get.create.product');
        Route::post('/create','AdminProductController@store')->name('post.create.product');

        Route::get('/update/{id}','AdminProductController@edit')->name('get.edit.product');
        Route::post('/update/{id}','AdminProductController@update')->name('post.edit.product');
    });
});
