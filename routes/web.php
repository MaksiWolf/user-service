<?php

use App\Http\Controllers\UsersController;
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

Route::middleware('admin')->group(function (){ //auth
    Route::get('/', [UsersController::class, 'index']);

    Route::post('/create', [UsersController::class, 'create']);

    Route::get('/byid/{id}', [UsersController::class, 'getUser']);

    Route::get('/byname/{name}', [UsersController::class, 'getUserByName']);

    Route::get('/bydate/{from}/{to}', [UsersController::class,'getUserByDate']);

    Route::post('/update/{id}', [UsersController::class, 'update']);

    Route::delete('/delete/{id}', [UsersController::class, 'delete']);
});
