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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/record-counter-sale', 'HomeController@record_counter_sale')->name('record-counter-sale');
Route::get('/record-counter-sale/list', 'HomeController@record_counter_sale_list')->name('record-counter-sale_list');
Route::get('/supplier/list', 'SupplierController@supplier_list')->name('supplier-list');
Route::get('/supplier/new-supplier', 'SupplierController@new_supplier')->name('new-supplier');
Route::get('/supplier/save_filling/{sales_type}', 'SupplierController@save_filling')->name('save-filling');
Route::get('/supplier/save_filling/{sales_type}/{id?}', 'SupplierController@save_filling')->name('save-filling');
Route::get('/supplier/add_filling/{sales_type}/{id?}', 'SupplierController@add_filling')->name('add-filling');
Route::get('/supplier/add_filling/{sales_type}', 'SupplierController@add_filling')->name('add-filling');
Route::get('/rates_by_id/{id?}',function($id){
    $rate = App\Sizes::find($id);

    return Response::json($rate);
})->name('rates_by_id');
Route::get('/counter-sales/datatables/data', 'HomeController@record_counter_sale_list_data')->name('datatables.data');

Route::post('/record-counter-sale/save', 'HomeController@record_counter_sale_save')->name('record-counter-sale_save');
Route::post('/supplier/save', 'SupplierController@save')->name('supplier-save');