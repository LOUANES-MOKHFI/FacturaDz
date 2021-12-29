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
//Auth::routes(['register'=>false]);

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

	//////products
	Route::group(['prefix' => 'products'],function(){
		Route::get('/','ProductsController@index')->name('admin.products');
		Route::get('/create','ProductsController@create')->name('admin.products.create');
		Route::post('/store','ProductsController@store')->name('admin.products.store');
		Route::get('/edit/{uuid}','ProductsController@edit')->name('admin.products.edit');
		Route::post('/update/{uuid}','ProductsController@update')->name('admin.products.update');
		Route::get('/delete/{uuid}','ProductsController@destroy')->name('admin.products.delete');
		Route::get('/get-product/{categoryId}','ProductsController@getProducts')->name('admin.products.getProducts');
	});
	//////invoice
	Route::group(['prefix' => 'invoices'],function(){
		Route::get('/','InvoiceController@index')->name('admin.invoices');
		Route::get('/Paid','InvoiceController@Paid')->name('admin.invoices.Paid');
		Route::get('/notPaid','InvoiceController@notPaid')->name('admin.invoices.notPaid');
		Route::get('/PartialyPaid','InvoiceController@PartialyPaid')->name('admin.invoices.PartialyPaid');
		Route::get('/archivedInvoice','InvoiceArchiveController@index')->name('admin.invoices.archivedInvoice');
		Route::post('/desarchive','InvoiceArchiveController@update')->name('admin.invoices.desarchive');
		Route::post('/archived/delete','InvoiceArchiveController@destroy')->name('admin.invoices.archived.delete');


		Route::get('/create','InvoiceController@create')->name('admin.invoices.create');
		Route::post('/store','InvoiceController@store')->name('admin.invoices.store');
		Route::get('/show/{uuid}','InvoiceController@show')->name('admin.invoices.show');
		Route::get('/edit/{uuid}','InvoiceController@edit')->name('admin.invoices.edit');
		Route::post('/update/{uuid}','InvoiceController@update')->name('admin.invoices.update');
		Route::post('/delete','InvoiceController@destroy')->name('admin.invoices.delete');
		Route::get('/print/{uuid}','InvoiceController@Print')->name('admin.invoices.print');
		Route::get('/changeStatus/{uuid}','InvoiceController@GetchangeStatus')->name('admin.invoices.changeStatus');
		Route::post('/changeStatus/{uuid}','InvoiceController@PostchangeStatus')->name('admin.invoices.changeStatus');

		Route::get('/file/open/{invoice_number}/{file_name}','InvoicesAttachementsController@open')->name('admin.invoices.file.open');
		Route::get('/file/download/{invoice_number}/{file_name}','InvoicesAttachementsController@download')->name('admin.invoices.file.download');
		Route::post('file/delete','InvoicesAttachementsController@destroy')->name('admin.invoices.file.delete');
		Route::post('/file/store','InvoicesAttachementsController@store')->name('admin.invoices.file.store');


	});
});

Route::get('/', function () {
    return view('auth.login');
});

});