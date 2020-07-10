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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin-page')->name('adminPage.')->group(function(){
	Route::get('/', 'AdminPage\BaseController@index')->name('base');
	Route::post('/call-data/{model}', 'AdminPage\BaseController@callData')->name('callData');

	Route::prefix('page')->name('page.')->group(function(){
		Route::get('/', 'AdminPage\PageController@index')->name('index');
		Route::post('/action', 'AdminPage\PageController@action')->name('action');
	});

	Route::prefix('product')->name('product.')->group(function(){
		Route::get('/', 'AdminPage\ProductController@index')->name('index');
		Route::post('/action', 'AdminPage\ProductController@action')->name('action');
	});

	Route::prefix('certificate')->name('certificate.')->group(function(){
		Route::get('/', 'AdminPage\CertificateController@index')->name('index');
		Route::post('/action', 'AdminPage\CertificateController@action')->name('action');
	});

	Route::prefix('news')->name('news.')->group(function(){
		Route::get('/', 'AdminPage\NewsController@index')->name('index');
	});

	Route::prefix('faq')->name('faq.')->group(function(){
		Route::get('/', 'AdminPage\FaqController@index')->name('index');
	});

	Route::get('/log-out', 'Auth\LoginController@index')->name('logout');
});

