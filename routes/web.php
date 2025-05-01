<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomePageController');

Route::get('/logout', 'AuthController@logout');

Route::get('/login', 'AuthController@login');
Route::post('/post-login', 'AuthController@postLogin');

Route::get('/register', 'AuthController@register');
Route::post('/post-register', 'AuthController@postRegister');

Route::get('/category/{id}', 'CategoryController');

Route::get('/product/{id}', 'ProductController');

Route::get('/cart', 'CartController@cart');
Route::post('/add-to-cart', 'CartController@addToCart');
Route::post('/submit-cart', 'CartController@submitCart');
Route::get('/delete-from-cart/{id}','CartController@deleteFromCart');
