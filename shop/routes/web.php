<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
	Session::forget('name_input');
	Session::forget('category_select');
	Session::forget('price_select');
	Session::forget('date_select');
			
    return view('main');
});

Route::get('/user/main', 'CRUDcontroller@checkAndGet')->name('get_products');
Route::post('/user/main', 'CRUDcontroller@checkAndGet')->name('get_products');

Route::get('/user/categories', 'CRUDcontroller@getcategoryPage')->name('get_categories');
// Route::post('/user/main', 'CRUDcontroller@checkAndGet')->name('get_products');

Route::get('/user/json', function () {
	Session::forget('name_input');
	Session::forget('category_select');
	Session::forget('price_select');
	Session::forget('date_select');
			
    return view('user_page.read_json');
})->name('get_json');


// Route::post('/user/send',['as' => 'send_filter', 'uses' => 'CRUDcontroller@filterfind']);

Route::post('/user/deleteCategory', 'CRUDcontroller@deleteCategory')->name('deleteCategory');

Route::post('/user/createCategory', 'CRUDcontroller@createCategory')->name('createCategory');

Route::post('/user/createProduct', 'CRUDcontroller@createProduct')->name('createProduct');

Route::post('/user/deleteProduct', 'CRUDcontroller@deleteProduct')->name('deleteProduct');

Route::post('/user/modalCategory', 'CRUDcontroller@modalCategory')->name('modalCategory');

Route::post('/user/updateCategory', 'CRUDcontroller@updateCategory')->name('updateCategory');