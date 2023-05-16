<?php

use \App\Http\Controllers\front;
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

// Client
Route::get('/', [\App\Http\Controllers\Front\HomeController::class,'index']);
Route::get('/faq', [\App\Http\Controllers\Front\HomeController::class,'faq']);
Route::get('/blog_dt', [\App\Http\Controllers\Front\HomeController::class,'blog_dt']);
Route::get('/contact', [\App\Http\Controllers\Front\HomeController::class,'contact']);
Route::post('/postContact', [\App\Http\Controllers\Front\HomeController::class,'postContact']);

Route::get('/AddCart2/{id}', [Front\CartController::class, 'AddCart2']);

Route::match(['get','post'],'/botman',[\App\Http\Controllers\Api\BotManController::class, 'handle']);

Route::prefix('shop')->group(function(){
    Route::get('/product/{id}', [Front\ShopController::class, 'show']);
    Route::get('/product/{id}/1', [Front\ShopController::class, 'show1']);
    Route::get('/product/{id}/2', [Front\ShopController::class, 'show2']);
    Route::get('/product/{id}/3', [Front\ShopController::class, 'show3']);
    Route::get('/product/{id}/4', [Front\ShopController::class, 'show4']);

    Route::post('/product/{id}', [Front\ShopController::class, 'postComment'])->middleware('CheckMemberLogin');

    Route::get('/',[Front\ShopController::class, 'index']);

    Route::get('/{categoryName}', [Front\ShopController::class, 'category']);

    Route::get('/product/{id}/add', [Front\ShopController::class, 'add']);
});

Route::prefix('cart')->group(function (){
    Route::get('add', [Front\CartController::class, 'add']);
    Route::get('/', [Front\CartController::class, 'index']);
    Route::get('delete', [Front\CartController::class, 'delete']);
    Route::get('destroy', [Front\CartController::class, 'destroy']);
    Route::get('update', [Front\CartController::class, 'update']);

    Route::get('addToCart', [Front\CartController::class, 'addToCart']);

    Route::get('addToCartS', [Front\CartController::class, 'addToCartS']);
    Route::get('addToCartM', [Front\CartController::class, 'addToCartM']);
    Route::get('addToCartL', [Front\CartController::class, 'addToCartL']);
    Route::get('addToCartXS', [Front\CartController::class, 'addToCartXS']);

    Route::get('save', [Front\CartController::class, 'save']);

});

Route::prefix('checkout')->middleware('CheckMemberLogin')->group(function (){
    Route::get('', [Front\CheckOutController::class, 'index']);
    Route::post('/', [Front\CheckOutController::class, 'addOrder']);
    Route::get('/result', [Front\CheckOutController::class, 'result']);

    Route::get('/vnPayCheck', [Front\CheckOutController::class, 'vnPayCheck']);

});

//Dang nhap bang google account
Route::get('google', [\App\Http\Controllers\API\GoogleController::class, 'redirectToGoogle']);
Route::get('google/callback', [\App\Http\Controllers\API\GoogleController::class, 'handleGoogleCallback']);

Route::prefix('account')->group(function (){
    Route::get('/login',[\App\Http\Controllers\Front\AccountController::class , 'login']);
    Route::post('login', [\App\Http\Controllers\Front\AccountController::class, 'checkLogin']);


    Route::get('/logout',[\App\Http\Controllers\Front\AccountController::class , 'logout']);

    Route::get('register',[\App\Http\Controllers\Front\AccountController::class , 'register']);
    Route::post('register',[\App\Http\Controllers\Front\AccountController::class , 'postRegister']);



    Route::prefix('my-order')->middleware('CheckMemberLogin')->group(function (){
       Route::get('/', [\App\Http\Controllers\Front\AccountController::class , 'myOrderIndex']);
       Route::get('/{id}', [\App\Http\Controllers\Front\AccountController::class , 'myOrderShow']);
       Route::get('comment/{id}', [\App\Http\Controllers\Front\AccountController::class , 'myOrderComment']);

        Route::post('postOrderComment/{id}', [\App\Http\Controllers\Front\AccountController::class , 'postOrderComment']);


       Route::post('/cancel/{id}', [\App\Http\Controllers\Front\AccountController::class , 'myOrderCancel']);
       Route::post('/delete/{id}', [\App\Http\Controllers\Front\AccountController::class , 'myOrderDelete']);
    });

    Route::prefix('address')->middleware('CheckMemberLogin')->group(function (){
        Route::get('/', [\App\Http\Controllers\Front\AccountController::class , 'myAddressIndex']);
        Route::get('/{id}', [\App\Http\Controllers\Front\AccountController::class , 'myAddressShow']);

        Route::post('get-districts', [\App\Http\Controllers\Front\AccountController::class, 'getDistricts']);
        Route::post('get-wards', [\App\Http\Controllers\Front\AccountController::class, 'getWards']);


        Route::post('/', [\App\Http\Controllers\Front\AccountController::class , 'postAddress']);

        Route::post('/{id}', [\App\Http\Controllers\Front\AccountController::class , 'myAddressUpdate']);

        Route::post('/delete/{id}', [\App\Http\Controllers\Front\AccountController::class , 'myAddressDelete']);
    });

    Route::prefix('info')->middleware('CheckMemberLogin')->group(function (){
        Route::get('/{id}',[\App\Http\Controllers\Front\AccountController::class , 'info']);
        Route::get('/{id}/change_password',[\App\Http\Controllers\Front\AccountController::class , 'change_password']);
        Route::post('/{id}/change_password',[\App\Http\Controllers\Front\AccountController::class , 'post_change_password']);
        Route::get('/{id}/change_info',[\App\Http\Controllers\Front\AccountController::class , 'change_info']);
        Route::post('/{id}/change_info',[\App\Http\Controllers\Front\AccountController::class , 'post_change_info']);
    });
});

// Admin
Route::prefix('admin')->middleware('CheckAdminLogin')->group(function (){
    Route::redirect('', 'admin/user');

    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::resource('category', App\Http\Controllers\Admin\ProductCategoryController::class);
    Route::resource('brand', App\Http\Controllers\Admin\BrandController::class);
    Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('product/{product_id}/image', App\Http\Controllers\Admin\ProductImageController::class);
    Route::resource('product/{product_id}/detail', App\Http\Controllers\Admin\ProductDetailController::class);
    Route::resource('order', App\Http\Controllers\Admin\OrderController::class);

    Route::post('order/hide/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'hide']);

    Route::resource('enter_coupon', \App\Http\Controllers\Admin\EnterCouponController::class);

    Route::get('statistics', [\App\Http\Controllers\Admin\StatisticController::class, 'index']);
    Route::post('statistics/filter_day', [\App\Http\Controllers\Admin\StatisticController::class, 'filter_day']);

    Route::prefix('login')->group(function (){
        Route::get('', [\App\Http\Controllers\Admin\HomeController::class, 'getLogin'])->withoutMiddleware('CheckAdminLogin');
        Route::post('', [\App\Http\Controllers\Admin\HomeController::class, 'postLogin'])->withoutMiddleware('CheckAdminLogin');
    });

    Route::get('logout', [\App\Http\Controllers\Admin\HomeController::class, 'logout']);
});

Route::prefix('partner')->middleware('CheckPartnerLogin')->group(function () {
    Route::redirect('', 'partner/index');

    Route::get('index', [\App\Http\Controllers\Partner\HomeController::class, 'index']);
    Route::get('shipping', [\App\Http\Controllers\Partner\HomeController::class, 'shipping_index']);
    Route::get('finish', [\App\Http\Controllers\Partner\HomeController::class, 'finish_index']);

    Route::post('shipping/{id}', [\App\Http\Controllers\Partner\HomeController::class, 'shipping']);
    Route::post('refuse/{id}', [\App\Http\Controllers\Partner\HomeController::class, 'refuse']);
    Route::post('finish/{id}', [\App\Http\Controllers\Partner\HomeController::class, 'finish']);

    Route::prefix('login')->group(function (){
        Route::get('', [\App\Http\Controllers\Partner\HomeController::class, 'getLogin'])->withoutMiddleware('CheckPartnerLogin');
        Route::post('', [\App\Http\Controllers\Partner\HomeController::class, 'postLogin'])->withoutMiddleware('CheckPartnerLogin');
    });
    Route::get('logout', [\App\Http\Controllers\Partner\HomeController::class, 'logout']);
});


