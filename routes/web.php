<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{CartController, FrontendController,WishListController,CheckoutController, OrderController, UserController};
use App\Http\Controllers\Admin\{DashboardController,SettingController,CategoryController,ProductController,ColorController, OrderController as AdminOrderController, SliderController,UserController as AdminUserController};
use App\Http\Controllers\HomeController; 
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::group([],function () {

    Route::get('/',[FrontendController::class,'index']);
    Route::get('/collections',[FrontendController::class,'categories']);
    Route::get('/collections/{category_slug}',[FrontendController::class,'products']);
    Route::get('/collections/{category_slug}/{product_slug}',[FrontendController::class,'productView']);

    Route::get('/new-arrivals',[FrontendController::class,'newArrival']);
    Route::get('/featured-products',[FrontendController::class,'featuredProducts']);
    Route::get('search', [FrontendController::class,'searchProducts']);
    Route::get('thank-you',[FrontendController::class, 'thankyou']);
});

Route::middleware(['auth'])->group(function() {
    Route::get('wishlist',[WishListController::class,'index']);
    Route::get('cart',[CartController::class,'index']);
    Route::get('checkout',[CheckoutController::class, 'index']);
    Route::get('orders',[OrderController::class, 'index']);
    Route::get('orders/{orderId}',[OrderController::class, 'showOrder']);
    Route::get('profile',[UserController::class, 'index']);
    Route::post('profile',[UserController::class, 'updateUserDetails']);
    Route::get('change-password',[UserController::class, 'createPassword']);
    Route::post('change-password',[UserController::class, 'changePassword']);
});



Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashboard',[DashboardController::class, 'index']);
    Route::get('settings',[SettingController::class, 'index']);
    Route::post('settings',[SettingController::class, 'store']);

    //Category Routes
    Route::resource('category', CategoryController::class);
       
    // Products Routes
    Route::group([],function () {
        Route::resource('products', ProductController::class);
        Route::get('product-image/{product_image_id}/delete', [ProductController::class, 'destroyImage']);
        Route::post('product-color/{prod_color_id}', [ProductController::class,'updateProductColorQuantity']);
        Route::get('product-color/{prod_color_id}/delete', [ProductController::class,'deleteProductColor']);
    });

    //Color Routes
    Route::resource('colors', ColorController::class);

    //Sliders Route
    Route::resource('sliders', SliderController::class);

    //Orders Route
    Route::group([],function () {
        Route::resource('orders', AdminOrderController::class);
        Route::get('/invoice/{orderId}', [AdminOrderController::class,'viewInvoice']);
        Route::get('/invoice/{orderId}/generate', [AdminOrderController::class,'generateInvoice']);
        Route::get('/invoice/{orderId}/mail', [AdminOrderController::class,'mailInvoice']);
    });

    //Users Route
    Route::resource('users', AdminUserController::class);
    
    Route::get('/brands',App\Http\Livewire\Admin\Brand\Index::class);
    
});