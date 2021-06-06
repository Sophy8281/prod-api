<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[AuthController::class,'register']);

//public routes
Route::get('/products', [ProductController::class,'index']);
Route::get('/products/{id}', [ProductController::class,'show']);

//Protected routes-Only authenticated users can have access to protected routes//
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products',[ProductController::class,'store']);
    Route::put('/products/{id}',[ProductController::class,'update']);
    Route::delete('/products/{id}',[ProductController::class,'delete']);
    Route::post('/logout',[AuthController::class,'logout']);
});

// Route::resource('products', ProductController::class);

// Route::get('/products', [ProductController::class,'index']);
// Route::post('/products', [ProductController::class,'store']);
// Route::post('/products', function () {

//     return Product::create([
//         'name'=>'Product One',
//          'slug'=>'product-one',
//          'description'=>'Details of Product One',
//          'price'=>100.00

//     ]);

// });
