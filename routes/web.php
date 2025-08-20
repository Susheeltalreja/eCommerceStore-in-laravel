<?php

use App\Http\Controllers\cartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;


//register AND login
Route::get('/form', [UserController::class, 'viewForm']);
Route::POST('/addUser', [UserController::class, 'store']);
Route::get('/loginForm', [UserController::class, 'login']);
Route::get('/', [UserController::class, 'home']);
Route::post('/checkAuth', [UserController::class, 'checkAuth']);

Route::middleware('userAuth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard']);
    //CRUD operation
    Route::get('/check_product', [ProductController::class, 'index']);

    Route::post('/post', [ProductController::class, 'store']);
    Route::get('/see_product', [ProductController::class, 'see_product']);

    Route::get('/edit/{id}', [ProductController::class, 'edit']);

    Route::put('/update/{id}', [ProductController::class, 'update']);

    Route::delete('/delete/{id}', [ProductController::class, 'destroy']);
    Route::get('/orders', [ProductController::class, 'orders']);
});
//Dashboard
// Route::get('/product', [UserController::class, 'home']);
Route::get('/logout', function () {
    session()->forget([
        "user_id",
        "role",
        "name"
    ]);
    return redirect('/loginForm');
});
//Session
Route::get('/getSession', [SessionController::class, 'getSession']);
Route::get('/setSession', [SessionController::class, 'setSession']);
Route::get('/destroySession', [SessionController::class, 'destroySession']);



//Cart

Route::post('/add-to-cart', [cartController::class, 'add_to_cart']);
Route::get('/cart', [cartController::class, 'getData']);
Route::post('/quantity/{id}', [cartController::class, 'quantity']);
Route::Post('remove/{id}', [cartController::class, 'Destroy']);

Route::get('checkout', [cartController::class, 'checkPage']);

Route::post('/place-order', [cartController::class, 'Checkout']);
Route::patch('/admin/order/{id}', [cartController::class, 'updateOrderStatus']);

Route::get('checkProduct', [userController::class, 'check']);

