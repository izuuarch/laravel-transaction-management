<?php

use App\Http\Controllers\Admincontroller\admindashboardcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Usercontroller\dashboadcontroller;
use App\Http\Controllers\Usercontroller\paymentcontroller;
use App\Http\Controllers\Usercontroller\transactioncontroller;
use App\Http\Controllers\Usercontroller\userdashboardcontroller;

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
// get routes
Route::prefix('account')->middleware('authlogic')->group(function(){
Route::get('/login', [authcontroller::class,'login'])->name('login');
Route::get('/register', [Authcontroller::class,'register'])->name('register');
// post route
Route::post('/signin', [authcontroller::class,'signin'])->name('signin');
Route::post('/signup', [authcontroller::class,'signup'])->name('signup');
});
Route::post('/logout', [authcontroller::class,'logout'])->name('logout');

// admin routes
Route::prefix('admin')->middleware('adminauth')->group(function(){
    // get routes for the collection
    Route::get('/dashboard', [admindashboardcontroller::class,'index'])->name('admindashboard');
    Route::get('/users', [admindashboardcontroller::class,'users'])->name('adminusers');
    Route::get('/alltransactions', [admindashboardcontroller::class,'alltransactions'])->name('alltransactions')->middleware('superauth');
});
// user routes
Route::prefix('user')->middleware('userauth')->group(function(){
    // get routes for the collection
    Route::get('/dashboard', [userdashboardcontroller::class,'index'])->name('userdashboard');
    Route::get('/payment', [paymentcontroller::class,'index'])->name('paymentpage');
    Route::get('/transactions', [transactioncontroller::class,'index'])->name('transactions');
    // post routes
    Route::post('/pay', [paymentcontroller::class,'pay'])->name('pay');
    Route::delete('/deletetransaction/{id}', [paymentcontroller::class,'softdelete']);
    Route::get('/trash', [paymentcontroller::class,'viewtrash'])->name('viewtrash');
    Route::delete('/forcedelete/{id}', [paymentcontroller::class,'forcedelete']);
    Route::post('/restore/{id}', [paymentcontroller::class,'restore']);
});