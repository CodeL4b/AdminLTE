<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('shipper','ShipperController');
Route::resource('seller','SellerController');
Route::resource('buyer','BuyerController');
Route::resource('cnf','CnfController');
Route::resource('sellerBank','SellerBankController');
Route::resource('buyerBank','BuyerBankController');
Route::resource('product','ProductController');
Route::resource('addInfo','AddInfoController');

