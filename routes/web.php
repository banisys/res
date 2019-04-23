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




Auth::routes();


Route::get('test3/{name}', function ($name) {
    return $name;
})->where('name', '[A-Za-z]+');

Route::get('/','IndexController@index')->name('index');
Route::get('test1','IndexController@test1')->name('test1');
Route::post('action','IndexController@action')->name('ajaxupload.action');

Route::post('cart/{food}','IndexController@cart')->name('cart');
Route::get('cart/ajax/{food}','IndexController@cart_ajax')->name('cart.ajax');
Route::get('cart','IndexController@cart_index')->name('cart.index');
Route::get('cart/destroy/{food}','IndexController@destroy_cart')->name('cart.destroy');

Route::get('data','OrderController@data')->name('data');
Route::post('payment','OrderController@payment')->name('payment');
Route::post('finish','OrderController@finish')->name('finish');
Route::get('finish/online','OrderController@finish_online')->name('finish.online');
Route::get('factor','OrderController@factor')->name('factor');
Route::get('online','OrderController@online')->name('online');
Route::get('follow','OrderController@follow')->name('follow');

Route::get('contact','IndexController@contact')->name('contact');



Route::get('admin/statistics','Admin\FoodController@statistics')->name('statistics');
Route::get('admin/statistics/chart/price','Admin\FoodController@statistics_chart_price')->name('statistics.chart.price');

Route::group(['namespace' => 'Admin', 'middleware' => ['auth'], 'prefix' => 'admin'], function () {

    $this::resource('/user', 'UserController');
    $this::resource('/role', 'RoleController');
    $this::resource('/permission', 'PermissionController');
    $this::resource('/food','FoodController');
});

Route::get('admin/food/gallery/{product}','Admin\FoodController@gallery')->name('food.gallery');
Route::get('admin/food/destroy_image/{image}','Admin\FoodController@destroy_image')->name('food.destroy_image');
Route::post('admin/food/store_thumbnail/{image}','Admin\FoodController@store_thumbnail')->name('food.store_thumbnail');
Route::get('admin/food/destroy_thumbnail/{image}','Admin\FoodController@destroy_thumbnail')->name('food.destroy_thumbnail');
Route::post('admin/food/upload/{product}','Admin\FoodController@upload')->name('food.upload');



Route::post('ref_num/{product}','IndexController@ref_num')->name('ref.num');


Route:: get('admin/orders','OrderController@admin_list')->name('order.admin_list');
Route:: get('admin/order/{o}','OrderController@admin_factor')->name('order.admin_factor');
Route:: get('admin/order_destroy/{o}','OrderController@destroy')->name('order.destroy');
Route::post('status/{order}','OrderController@status')->name('order.status');

Route::post('search/index','IndexController@search_index')->name('search.index');

Route:: get('panel/order','IndexController@panel_order')->name('panel.order');

Route::get('login/redirect','Admin\foodController@gallery')->middleware('Login_redirect');


Route::get('admin/cat/index','Admin\foodController@index_cat')->name('cat.index');
Route::post('admin/cat/store/{cat}','Admin\foodController@store_cat')->name('cat.store');

Route::get('list/{cat}','IndexController@list')->name('list');

Route::get('map/{o}','OrderController@map')->name('map');

Route::get('admin/task/create','Admin\personelController@create_task')->name('task.create');
Route::get('admin/task/store','Admin\personelController@store_task')->name('task.store');
Route::delete('task/destroy/{task}','Admin\personelController@destroy_task')->name('task.destroy');

Route::get('admin/personel','Admin\personelController@index')->name('personel.index');
Route::get('admin/personel/create','Admin\personelController@create')->name('personel.create');
Route::post('admin/personel/store','Admin\personelController@store')->name('personel.store');
Route::get('admin/personel/edit/{personel}','Admin\personelController@edit')->name('personel.edit');
Route::post('admin/personel/update/{personel}','Admin\personelController@update')->name('personel.update');
Route::delete('admin/personel/destroy/{personel}','Admin\personelController@destroy')->name('personel.destroy');

Route::post('admin/personel/store_image/{image}','Admin\PersonelController@store_image')->name('personel.store_image');
Route::get('admin/personel/destroy_image/{image}','Admin\PersonelController@destroy_image')->name('personel.destroy_image');

Route::post('admin/personel/store_scan/{scan}','Admin\PersonelController@store_scan')->name('personel.store_scan');
Route::get('admin/personel/destroy_scan/{scan}','Admin\PersonelController@destroy_scan')->name('personel.destroy_scan');

Route::get('admin/receive/create/{personel}','Admin\personelController@create_receive')->name('receive.create');
Route::post('admin/receive/store/{personel}','Admin\personelController@store_receive')->name('receive.store');
Route::delete('receive/destroy/{receive}','Admin\personelController@destroy_receive')->name('receive.destroy');
Route::get('admin/statistics/chart/receive{personel}','Admin\personelController@statistics_chart_receive')->name('statistics.chart.receive');

Route::get('admin/overtime/create/{personel}','Admin\personelController@create_overtime')->name('overtime.create');
Route::post('admin/overtime/store/{personel}','Admin\personelController@store_overtime')->name('overtime.store');
Route::delete('overtime/destroy/{overtime}','Admin\personelController@destroy_overtime')->name('overtime.destroy');
Route::get('admin/statistics/chart/overtime{personel}','Admin\personelController@statistics_chart_overtime')->name('statistics.chart.overtime');

Route::get('admin/delay/create/{personel}','Admin\personelController@create_delay')->name('delay.create');
Route::post('admin/delay/store/{personel}','Admin\personelController@store_delay')->name('delay.store');
Route::delete('delay/destroy/{delay}','Admin\personelController@destroy_delay')->name('delay.destroy');
Route::get('admin/statistics/chart/delay{personel}','Admin\personelController@statistics_chart_delay')->name('statistics.chart.delay');

Route::get('admin/vacation/create/{personel}','Admin\personelController@create_vacation')->name('vacation.create');
Route::post('admin/vacation/store/{personel}','Admin\personelController@store_vacation')->name('vacation.store');
Route::delete('vacation/destroy/{vacation}','Admin\personelController@destroy_vacation')->name('vacation.destroy');

Route::get('admin/absent/create/{personel}','Admin\personelController@create_absent')->name('absent.create');
Route::post('admin/absent/store/{personel}','Admin\personelController@store_absent')->name('absent.store');
Route::delete('absent/destroy/{absent}','Admin\personelController@destroy_absent')->name('absent.destroy');

Route::get('uploadedFile/{filename}', 'FileController@getFile')->name('get.file');

Route::get('testt', 'Indexcontroller@test')->name('vue');


