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
Route::get('/','IndexController@index');
Route::prefix('index')->group(function(){
    route::any('index', 'IndexController@index');
    route::any('indexlist', 'IndexController@indexlist');
});
Route::prefix('shop')->group(function(){
    route::any('shopcart','ShopController@shopcart');
    route::any('shopcontent/{goods_id}','ShopController@shopcontent');
    route::any('cartadd','ShopController@cartadd');
    route::any('buycar','ShopController@buycar');
    route::any('delcart','ShopController@delcart');
    route::any('somedel','ShopController@somedel');
    route::any('pay','ShopController@pay');
    route::any('payment/{id}','ShopController@payment');
});
Route::prefix('all')->group(function () {
    route::any('allshop', 'AllController@allshop');
    route::any('allshopdo', 'AllController@allshopdo');
    route::any('price', 'AllController@price');
    route::any('isnew', 'AllController@isnew');

});
Route::prefix('share')->group(function () {
    route::any('willshare', 'ShareController@willshare');
    route::any('share', 'Sh areController@share');
});
Route::prefix('login')->group(function () {
    route::any('login', 'LoginController@login');
    route::any('logindo', 'LoginController@logindo');
});
Route::prefix('user')->group(function () {
    route::any('userpage', 'UserController@userpage');
    route::any('writeaddr', 'UserController@writeaddr');
    route::any('writeaddrdo', 'UserController@writeaddrdo');
    route::any('address', 'UserController@address');
    route::any('addressdel', 'UserController@addressdel');
    route::any('addressup/{id}', 'UserController@addressup');
    route::any('addressupdo', 'UserController@addressupdo');
    route::any('addressmoren', 'UserController@addressmoren');
});
Route::prefix('rigister')->group(function () {
    route::any('rigister', 'RigisterController@rigister');
    route::any('rigisterdo', 'RigisterController@rigisterdo');
    route::any('doregister', 'RigisterController@doregister');
});
Route::prefix('ailpay')->group(function () {
    route::any('mobilepay', 'AilPayController@mobilepay');
    route::any('return', 'AilPayController@re');
    route::any('notify', 'AilPayController@notify');

});
route::any('verify/create', 'CaptchaController@create');