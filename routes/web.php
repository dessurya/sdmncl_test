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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about-us', 'AboutUsController@index')->name('about-us');
Route::get('/product', 'ProductController@index')->name('product');
Route::get('/certificate', 'CertificateController@index')->name('certificate');
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/faq', 'FaqController@index')->name('faq');

Route::get('locale/{lang}', function($lang){ // test nya pada dashboard
	if(in_array($lang,array('id', 'en'))){
		session()->put('locale', $lang);
	}
	else{
		session()->put('locale', 'id');
	}
	return back();
})->name('locale.change');

Route::prefix('admin-page')->name('adminPage.')->group(function(){

	Route::get('/login', 'Auth\LoginController@view')->name('login.view');
	Route::post('/login/execute', 'Auth\LoginController@loginExe')->name('login.exe');

	Route::middleware('users')->group(function(){
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
			Route::post('/action', 'AdminPage\NewsController@action')->name('action');
		});

		Route::prefix('faq')->name('faq.')->group(function(){
			Route::get('/', 'AdminPage\FaqController@index')->name('index');
			Route::post('/action', 'AdminPage\FaqController@action')->name('action');
		});

		Route::get('/log-out', 'Auth\LoginController@logout')->name('logout');
	});
});

