<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function() {
	Route::resource('categories', 'Api\CategoryController', ['except' => ['create', 'edit', 'show']]);
    Route::resource('units', 'Api\UnitController', ['except' => ['create', 'show']]);
    Route::get('units/status/{unit}/{status}', 'Api\UnitController@updateStatus');
});


