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
//fontend
Route::get('/', 'UserController@login_user');
Route::get('/trang-chu', 'HomeController@index');

//backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::get('/logout', 'AdminController@log_out');
Route::post('/admin-dashboard', 'AdminController@dashboard');

//category_product
Route::get('/add-category-food', 'CategoryProduct@add_category_food');

Route::get('/edit-category-food/{id_danh_muc}', 'CategoryProduct@edit_category_food');
Route::get('/delete-category-food/{id_danh_muc}', 'CategoryProduct@delete_category_food');

Route::post('/update-category-food/{id_danh_muc}', 'CategoryProduct@update_category_food');

Route::get('/list-category-food', 'CategoryProduct@list_category_food');
Route::post('/save-category-food', 'CategoryProduct@save_category_food');
Route::get('/hienthi/{id_danh_muc}', 'CategoryProduct@hienthi');
Route::get('/an/{id_danh_muc}', 'CategoryProduct@an');

//food
Route::get('/add-food', 'FoodController@add_food');
Route::get('/list-food', 'FoodController@list_food');
Route::get('/edit-food/{id_mon_an}', 'FoodController@edit_food');
Route::get('/delete-food/{id_mon_an}', 'FoodController@delete_food');
Route::post('/save-food', 'FoodController@save_food');
Route::post('/update-food/{id_mon_an}', 'FoodController@update_food');
Route::post('/date', 'FoodController@find_food');
Route::get('/hienthifood/{id_mon_an}', 'FoodController@hienthifood');
Route::get('/anfood/{id_mon_an}', 'FoodController@anfood');

//Route::post('/save-category-food2', 'CategoryProduct@save_category_food');login-user
//user
Route::get('/login-user', 'UserController@login_user');
Route::get('/dang-ki-user', 'UserController@dang_ki_user');
Route::post('/dang-nhap', 'UserController@dang_nhap');
Route::post('/dang-ki', 'UserController@dang_ki');
Route::get('/dang-xuat', 'UserController@dang_xuat');
//giohang
Route::any('/gio-hang', 'OrderController@cartview');
Route::get('/xoa-giohang/{id}', 'OrderController@cartdelete');
Route::post('/don-hang', 'FoodController@don_hang');
Route::post('/dat-hang', 'FoodController@dat_hang');
Route::get('/don-hang-admin', 'OrderController@donhang_admin');
Route::get('/nhan-donhang/{id_taikhoan}', 'OrderController@nhan_donhang');
Route::get('/huy-donhang/{id_taikhoan}', 'OrderController@huy_donhang');

//ajax
Route::post('/hien-an-mon-an', 'FoodController@display');
//combocomngon
Route::post('/combocomngon', 'FoodController@dat_hang');





