<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::pattern('id', '[0-9]+');

Route::prefix('/users')->as('user.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::post('/', [UserController::class, 'store'])->name('store'); // Route::post('/users/', [UserController::class, 'store'])->name('user.store');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
    Route::get('/{id}', [UserController::class, 'show'])->name('show');
    Route::delete('/{id}', [UserController::class, 'delete'])->name('delete');
});

// name-y nra hamar a, vor gres route('user.store') <=> '/users/' method post
