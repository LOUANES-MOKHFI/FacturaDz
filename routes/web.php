<?php

use Illuminate\Support\Facades\Route;

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

;
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
Auth::routes();

Route::group(['middleware' => ['web' , 'admin'],'prefix' => 'admin' ,'namespace'=>'Admin'], function(){
	Route::get('/index', 'HomeController@index')->name('admin')->middleware('auth');

	//////settings app
	Route::group(['prefix' => 'settings'],function(){
		Route::get('/','SettingsController@index')->name('admin.settings');
		///categories Products
		Route::group(['prefix' => 'categories'],function(){
			Route::get('/','CategoryController@index')->name('admin.settings.categories');
			Route::get('/create','CategoryController@create')->name('admin.settings.categories.create');
			Route::post('/store','CategoryController@store')->name('admin.settings.categories.store');
			Route::get('/edit/{uuid}','CategoryController@edit')->name('admin.settings.categories.edit');
			Route::post('/update/{uuid}','CategoryController@update')->name('admin.settings.categories.update');
			Route::get('/delete/{uuid}','CategoryController@destroy')->name('admin.settings.categories.delete');
		});
	});

	//////invoice
	Route::group(['prefix' => 'invoices'],function(){
		Route::get('/','InvoiceController@index')->name('admin.invoices');
		Route::get('/create','InvoiceController@create')->name('admin.invoices.create');
		Route::post('/store','InvoiceController@store')->name('admin.invoices.store');
		Route::get('/edit/{uuid}','InvoiceController@edit')->name('admin.invoices.edit');
		Route::post('/update/{uuid}','InvoiceController@update')->name('admin.invoices.update');
		Route::get('/delete/{uuid}','InvoiceController@destroy')->name('admin.invoices.delete');
	});
});

Route::get('/', function () {
    return view('home');
});

});