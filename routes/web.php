<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\{StaffController,ServiceController,PageController,BannerController};
use App\Http\Controllers\{StaffDeController,BookingController,HomeController};
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

// Route::get('/', function () {
//     return view('index');
// });

// HomeController
Route::get('/',[HomeController::class,'index']);

Route::get('/service/{id}',[HomeController::class,'service']);
Route::get('/testimonial',[HomeController::class,'testimonial']);
Route::post('/save_testimonial',[HomeController::class,'save_testimonial']);

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/admin/login',[AdminController::class,'login']);
Route::post('/admin/login1',[AdminController::class,'check_login']);
Route::get('/admin/login2',[AdminController::class,'check_login2']);
Route::get('/admin/logout',[AdminController::class,'logout']);
Route::get('/admin/testimonial',[AdminController::class,'admin_testimonial']);
Route::get('admin/testimonial/{id}/delete', [AdminController::class,'destroy']);
// roomtype
Route::get('admin/roomtype/{id}/delete', [RoomTypeController::class,'destroy']);
Route::resource('admin/roomtype', RoomTypeController::class);

//RoomController
Route::get('admin/room/{id}/delete', [RoomController::class,'destroy']);
Route::resource('admin/room', RoomController::class);

//CustomerController
Route::get('admin/customer/{id}/delete', [CustomerController::class,'destroy']);
Route::resource('admin/customer', CustomerController::class);

//StaffController
Route::get('admin/department/{id}/delete', [StaffController::class,'destroy']);
Route::resource('admin/department', StaffController::class);

//StaffDeController
Route::get('admin/staff/{id}/delete', [StaffDeController::class,'destroy']);
Route::resource('admin/staff', StaffDeController::class);

//Staff payment
Route::get('admin/staff/payment/{staff_id}/add',[StaffDeController::class,'payment_add']);
Route::post('admin/staff/add_payment/{staff_id}/add_payment',[StaffDeController::class,'payment_show']);
Route::get('admin/staff/show_payment/{staff_id}/show_payment',[StaffDeController::class,'show_payment']);
Route::get('admin/staff/payment/{id}/{$staff_id}/delete', [StaffDeController::class,'destroy_payment']);


//booking
Route::get('admin/booking/{id}/delete', [BookingController::class,'destroy']);
Route::get('admin/booking/available-room/{check_date}', [BookingController::class,'avabil_room']);
Route::resource('admin/booking', BookingController::class);

// login side
Route::get('login', [CustomerController::class,'login']);
Route::post('customer/login', [CustomerController::class,'customer_login']);
Route::get('register', [CustomerController::class,'register']);
Route::get('logout', [CustomerController::class,'logout']);

//booking
Route::get('booking', [BookingController::class,'booking_room']);
Route::get('booking/success', [BookingController::class,'booking_payment_success']);
Route::get('booking/fail', [BookingController::class,'booking_payment_fail']);


//StaffDeController
Route::get('admin/service/{id}/delete', [ServiceController::class,'destroy']);
Route::resource('admin/service', ServiceController::class);


Route::get('about', [PageController::class,"about"]);
Route::get('contact', [PageController::class,"contact"]);

// Banner
Route::get('admin/banner/{id}/delete', [BannerController::class,'destroy']);
Route::resource('admin/banner', BannerController::class);