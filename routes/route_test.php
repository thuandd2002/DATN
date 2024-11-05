<?php


Route::group(['prefix' => 'test'], function(){
    Route::group(['prefix' => 'email'], function (){
       Route::get('/app',function (){
            return view('email.app');
       });

       Route::get('/send', function(){

           $data = [
               'email' => 'ahihi@gmail.com',
               'phone' => '0986420994'
           ];

           \Illuminate\Support\Facades\Mail::to('phupt.humg.94@gmail.com')
               ->send(new \App\Mail\SuccessInfoEmail($data));
       });
    });

    Route::get('clear_cache', function(){

        @unlink(storage_path().'/frameword/cache');
        \Storage::deleteDirectory(storage_path().'/frameword/cache');
    });

    Route::group(['prefix' => 'clear'],function (){
        //Clear Cache facade value:
        Route::get('/clear-cache', function() {
            $exitCode = Artisan::call('cache:clear');
            return '<h1>Cache facade value cleared</h1>';
        });

//Reoptimized class loader:
        Route::get('/optimize', function() {
            $exitCode = Artisan::call('optimize');
            return '<h1>Reoptimized class loader</h1>';
        });

//Route cache:
        Route::get('/route-cache', function() {
            $exitCode = Artisan::call('route:cache');
            return '<h1>Routes cached</h1>';
        });

//Clear Route cache:
        Route::get('/route-clear', function() {
            $exitCode = Artisan::call('route:clear');
            return '<h1>Route cache cleared</h1>';
        });

//Clear View cache:
        Route::get('/view-clear', function() {
            $exitCode = Artisan::call('view:clear');
            return '<h1>View cache cleared</h1>';
        });

//Clear Config cache:
        Route::get('/config-cache', function() {
            $exitCode = Artisan::call('config:cache');
            return '<h1>Clear Config cleared</h1>';
        });
    });
});
