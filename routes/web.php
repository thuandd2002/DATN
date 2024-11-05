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

Auth::routes();

//luu thong tin nhap email cua nguoi dung

Route::group(['prefix' => 'ajax'], function(){
    Route::post('/save/email','Frontend\GuestController@saveEmailGuest')->name('ajax.post.guest.save');
    Route::post('/save/info/guest','Frontend\GuestController@saveInfoGuest')->name('ajax.post.guest.saveinfo');
    Route::post('/save/info_footer/guest','Frontend\GuestController@saveInfoFooterGuest')->name('ajax.post.guest.saveinfofooter');

});

Route::group(['prefix' => '','middleware' => ['web']], function(){
    Route::get('/redirect/{social}', 'Auth\SocialAuthController@redirect')->name('get.social.redirect');
    Route::get('/callback/{social}', 'Auth\SocialAuthController@callback')->name('post.social.callback');
});

Route::get('/dang-ky', 'Auth\RegisterController@register')->name('get.register');
Route::post('/dang-ky', 'Auth\RegisterController@postRegister')->name('get.register');

Route::get('/dang-nhap', 'Auth\LoginController@login')->name('get.login');
Route::post('/dang-nhap', 'Auth\LoginController@postLogin')->name('get.login');

Route::get('/dang-xuat', 'Auth\LoginController@logout')->name('get.logout');

Route::group(['namespace' => 'Frontend', 'middleware' => ['web','visitor']], function () {

    Route::get('/','HomeController@index')->name('get.index');
    Route::get("/demo/sendmail",'DemoMailController@sendmail');
    // menu
    Route::get('/chuyen-muc/{slug}-{id}','MenuController@action')->name('get.menu.action');
    Route::get('/san-pham.html','ProductController@getProducList')->name('get.product.list');
    //chi tiet san pham
    Route::post('/san-pham/tang-view','ProductController@tangView')->name('product.tangView');

    Route::get('/san-pham/{slug}-{id}','ProductController@getProducDetail')->name('get.product.detail');
    // Route::post('/sản-phẩm/insert_rating','CommentController@addComment');
    //chi tiet bai viet
    Route::get('bai-viet/{slug}-{id}','ArticleController@getArticleDetail')->name('get.article.detail');

    Route::post('/bai-viet/tang-view','ArticleController@tangView')->name('post.tangView');

    Route::get('/tim-kiem/{slug?}','SearchController@search')->name('get.search');
    /// comment
    Route::post('/ajax/comment/add','CommentController@addComment')->name('ajax.comment.add');
    Route::get('/clear/cache', function (){
        \File::deleteDirectory(storage_path('framework/cache'));
        return redirect('/');
    });

    Route::get('account/profile', 'AccountController@index')->name('account.profile');
    Route::post('/update/profile', 'AccountController@updateProfile')->name('update.profile');
    Route::get('/profile/calendar', 'AccountController@calendar')->name('profile.calendar');
    Route::get('account/change/password', 'AccountController@changePassword')->name('account.change.password');
    Route::post('update/change/password', 'AccountController@postChangePassword')->name('update.change.password');

    Route::get('user/forgot/password', 'AccountController@forgotPassword')->name('user.forgot.password');
    Route::post('post/forgot/password', 'AccountController@postForgotPassword')->name('post.forgot.password');


    Route::post('/postMessage', 'SendMessageController@sendMessage')->name('postMessage');
    
});

include_once 'route_test.php';