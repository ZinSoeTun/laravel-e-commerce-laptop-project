<?php

use App\Http\Controllers\GreenLandController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Green Landhome routes
Route::get('/', [GreenLandController::class, 'home'])->name('greenland.home');
Route::get('/choice/products/{id}', [GreenLandController::class, 'choice'])->name('choice.products');
Route::post('/contact', [ContactController::class, 'contact'])->name('contact');



//middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //prevent-back url
    Route::middleware(['prevent-back-history'])->group(function () {
        //profile route url
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::post('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/edit/password', [UserController::class, 'password'])->name('profile.edit.password');
    });
    ///admin middleware
    Route::middleware(['admin'])->group(function () {
        //admin dashboard URL
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        //category URLs
        Route::prefix('admin/category')->group(function () {
            Route::get('/page', [CategoryController::class, 'page'])->name('category.page');
            Route::post('/create', [CategoryController::class, 'create'])->name('category.create');
            Route::get('/list', [CategoryController::class, 'list'])->name('category.list');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
            Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
        });
        //product URLs
        Route::prefix('admin/product')->group(function () {
            Route::get('/page', [ProductController::class, 'page'])->name('product.page');
            Route::post('/create', [ProductController::class, 'create'])->name('product.create');
            Route::get('/list', [ProductController::class, 'list'])->name('product.list');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
            Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
        });
        //order URLs
        Route::prefix('admin/order')->group(function () {
            Route::get('/list', [OrderController::class, 'orderList'])->name('order.list');
            Route::get('/deliver/{number}', [OrderController::class, 'deliver'])->name('order.deliver');
            Route::get('/delete/{number}', [OrderController::class, 'orderDelete'])->name('order.delete');
            Route::get('/detail/{number}', [OrderDetailController::class, 'detail'])->name('order.detail');
        });
        //user account URLs
        Route::prefix('admin/account/user')->group(function () {
            Route::get('/list', [AdminController::class, 'userList'])->name('user.list');
            Route::get('/detail/{id}', [AdminController::class, 'userDetail'])->name('user.detail');
            Route::get('/promote/{id}', [AdminController::class, 'promote'])->name('user.promote');
            Route::get('/delete/{id}', [AdminController::class, 'userDelete'])->name('user.delete');
        });
        //admin account URLs
        Route::prefix('admin/account/admin')->group(function () {
            Route::get('/list', [AdminController::class, 'adminList'])->name('admin.list');
            Route::get('/detail/{id}', [AdminController::class, 'adminDetail'])->name('admin.detail');
            Route::get('/change/{id}', [AdminController::class, 'change'])->name('change.user');
            Route::get('/delete/{id}', [AdminController::class, 'adminDelete'])->name('admin.delete');
        });
        //contact URLs
        Route::prefix('admin/contact')->group(function () {
            Route::get('/list', [ContactController::class, 'contactList'])->name('contact.list');
            Route::get('/detail/{id}', [ContactController::class, 'contactDetail'])->name('contact.detail');
            Route::get('/delete/{id}', [ContactController::class, 'contactDelete'])->name('contact.delete');
        });
        //search form
        Route::post('/search', [SearchController::class, 'searchQuery'])->name('search');
    });


    //user middle
    Route::middleware(['user'])->group(function () {
        Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
        Route::get('/cart', [CartController::class, 'cart'])->name('cart');
        Route::get('/cart/product/delete', [CartController::class, 'deleteProduct'])->name('cart.product.delete');
        Route::get('/cart/clear', [CartController::class, 'cartClear'])->name('cart.clear');
        Route::post('/order', [OrderController::class, 'order'])->name('order');
    });
});
