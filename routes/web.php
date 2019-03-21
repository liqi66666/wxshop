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

Route::get('/welcome', function () {
    return view('views.welcome');
});
Route::prefix('index')->group(function () {
    route::any('index', 'IndexController@index');
    route::any('indexlist', 'IndexController@indexlist');
});
Route::prefix('shop')->group(function () {
    route::any('shopcart','ShopController@shopcart');
    route::any('shopcontent/{goods_id}', 'ShopController@shopcontent');
    route::any('cartadd','ShopController@cartadd');
    route::any('buycar','ShopController@buycar');

});
Route::prefix('all')->group(function () {
    route::any('allshop', 'AllController@allshop');
    route::any('allshopdo', 'AllController@allshopdo');
});
Route::prefix('share')->group(function () {
    route::any('willshare', 'ShareController@willshare');
    route::any('share', 'ShareController@share');
});
Route::prefix('login')->group(function () {
    route::any('login', 'LoginController@login');
    route::any('logindo', 'LoginController@logindo');

});
Route::prefix('user')->group(function () {
    route::any('userpage', 'UserController@userpage');
});
Route::prefix('rigister')->group(function () {
    route::any('rigister', 'RigisterController@rigister');
    route::any('rigisterdo', 'RigisterController@rigisterdo');
    route::any('doregister', 'RigisterController@doregister');
});
route::any('verify/create', 'CaptchaController@create');


