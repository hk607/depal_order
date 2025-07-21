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
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Redirect;

// //php artisan command by route
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return "Config is cache";
});

Route::get('/config-clear', function() {
    Artisan::call('config:clear');
    return "Config is cleared";
});

Route::get('/route-clear', function() {
    Artisan::call('route:clear');
    return "Route is cleared";
});

Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return "View is cleared";
});

// //php artisan command by route
Route::get('/route-list', function() {
   Artisan::call('route:list');
});

Route::get('/', [HomeController::class, 'index'])->name('welcome');
//home
// Route::get('/', function () {
//     return view('welcome');

// })->name('welcome');

//about
Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

//countact us
Route::get('/contactus', function () {
    return view('contactus');
})->name('contactus');

Route::get('/restaurant', function () {
    return view('restaurant');
})->name('restaurant');

Route::get('/other-activities', function () {
    return view('other-activities');
})->name('other-activities');

//term & Condition
Route::get('/term-and-conditions', function () {
    return view('term_and_conditions');
})->name('term-and-conditions');

//private policy
Route::get('/privacy-policy', function () {
    return view('private_policy');
})->name('privacy-policy');

//private policy
Route::get('/refund-policy', function () {
    return view('refund_policy');
})->name('refund-policy');

Route::get('/success-message/{bookingNumber}', [RazorpayController::class,'success_message'])->name('success-message');

Route::get('/redirects', function(){
	return redirect(Redirect::intended()->getTargetUrl());
	// You can replace above line with the following to return to previous page
	return back();	// or return redirect()->back();
});

Auth::routes();

Route::get('/product/{slug}', [ProductsController::class, 'show'])->name('product.details');
Route::get('/add-to-cart/{id}', [CartController::class, 'add'])->name('cart.add');
/*
   * Admin Auth Conroller
   *
*/
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('adminDashboard');
        Route::get('/changepassword', [AdminController::class, 'changepassword'])->name('changepassword');
        Route::post('/updatepassword', [AdminController::class, 'updatePassword'])->name('updatepassword');
        Route::resource('products', ProductController::class);
        Route::resource('products', ProductController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('categories', CategoryController::class);
        Route::post('/adminLogout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/member_register', [App\Http\Controllers\HomeController::class, 'member_register'])->name('member_register');
Route::post('/member_login', [App\Http\Controllers\HomeController::class, 'member_login'])->name('member_login');

Route::get('razorpay', [RazorpayController::class, 'razorpay'])->name('razorpay');
Route::post('razorpaypayment', [RazorpayController::class, 'payment'])->name('payment');
