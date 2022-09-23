<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\OrderController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\{Route, Auth, DB};


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/', 'FrontendController@index')->name('index');
Route::get('category/{id}', 'FrontendController@category');
Route::get('front-product', 'FrontendController@product');
Route::get('view-product/{id}', 'FrontendController@view_product');

Route::post('order/{id}', 'OrderController@index');
Route::get('checkout', 'OrderController@checkout');
Route::delete('checkout/{id}', 'OrderController@delete');
Route::get('cancel', 'OrderController@cancel');
Route::get('confirm', 'OrderController@confirm');
Route::get('final', 'OrderController@final');

Route::get('history', 'HistoryController@index');
Route::get('history/{id}', 'HistoryController@detail');

Route::get('profile', 'ProfileController@index');
Route::post('profile', 'ProfileController@create');
Route::post('profile/{id}', 'ProfileController@update');

Route::get('test', 'TestController@test');
Route::get('test/pdf', 'TestController@createPDF');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('role:admin')->group(function () {
    Route::get('/admin', function () {
        $users = DB::table('users')->count();
        return view('admin.index', compact('users'));
    });

    // category
    Route::get('category', 'Admin\CategoryController@index');
    Route::get('category-create', 'Admin\CategoryController@create');
    Route::get('category-show/{id}', 'Admin\CategoryController@show');
    Route::post('category', 'Admin\CategoryController@store');
    Route::get('category-edit/{id}', 'Admin\CategoryController@edit');
    Route::post('category-update/{id}', 'Admin\CategoryController@update');
    Route::get('category-delete/{id}', 'Admin\CategoryController@delete');

    // product

    Route::get('product', 'Admin\ProductController@index');
    Route::get('product-create', 'Admin\ProductController@create');
    Route::get('product-show/{id}', 'Admin\ProductController@show');
    Route::post('product', 'Admin\ProductController@store');
    Route::get('product-edit/{id}', 'Admin\ProductController@edit');
    Route::post('product-update/{id}', 'Admin\ProductController@update');
    Route::get('product-delete/{id}', 'Admin\ProductController@delete');

    // user

    Route::get('user', 'Admin\UserController@index');
    Route::get('user_order/{id}', 'Admin\UserController@order');
    Route::get('order_detail/{id}', 'Admin\UserController@order_detail');
});
