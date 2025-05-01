<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')
    ->group(
        function () {

            Route::get('/', function () {
                return view('admin.index');
            });

            Route::prefix('/categories')
                ->group(
                    function () {
                        Route::get('/', 'CategoryController@index');

                        Route::get('/create', 'CategoryController@create');

                        Route::post('/store', 'CategoryController@store');

                        Route::get('/delete/{id}', 'CategoryController@delete');

                        Route::get('/edit/{id}', 'CategoryController@edit');

                        Route::post('/update', 'CategoryController@update');
                    }
                );

            Route::prefix('/products')
                ->group(
                    function () {
                        Route::get('/', 'ProductController@index');

                        Route::get('/create', 'ProductController@create');

                        Route::post('/store', 'ProductController@store');

                        Route::get('/edit/{id}','ProductController@edit');

                        Route::post('/update','ProductController@update');

                        Route::get('/delete/{id}','ProductController@delete');
                    }
                );

                Route::prefix('/users')
                ->group(
                    function () {
                        Route::get('/','UserController@index');
    
                    }
                );
        }
    );
