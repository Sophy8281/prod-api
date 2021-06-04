<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;

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

Route::resource('products', ProductController::class);
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
