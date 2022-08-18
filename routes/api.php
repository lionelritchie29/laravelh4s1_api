<?php

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// route nya di auto prefix pake /api
Route::prefix('products')->group(function() {
    Route::get('/', function() {
        $products = Product::all();
        return ['data' => ProductResource::collection(($products))];
    });

    Route::post('/', function(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        return Product::create($data);
    })->middleware('auth:api');

    Route::put('/', function(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'id' => 'required|exists:products'
        ]);

        return Product::find($data['id'])->update($data);
    });

    Route::delete('/{id}', function($id) {
        return Product::find($id)->delete();
    }); 
});


Route::post('/login', function(Request $request) {
    $data = $request->validate([
        'email' => 'required|string',
        'password' => 'required|string'
    ]);

    if (Auth::attempt($data)) {
        $user = Auth::user();
        return ['token' => $user->createToken('access_token')->accessToken];
    } else {
        return ['token' => null];
    }
});