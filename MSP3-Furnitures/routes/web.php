<?php

use App\Http\Controllers\ApiFurnitures\FurnituresController;
use App\Http\Controllers\ApiFurnitures\OrdersController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/api/register', [AuthController::class, 'register']);
Route::post('/api/login', [AuthController::class, 'login']);
Route::post('/api/logout', [AuthController::class, 'logout']);
Route::get('/api/me', [AuthController::class, 'me']);


Route::get('/api/supplies', [FurnituresController::class, 'getListFurniture']);
Route::get('/api/supplies/{id}', [FurnituresController::class, 'getDetailsFurniture']);
Route::post('/api/supplies', [FurnituresController::class, 'addFurniture']);
Route::put('/api/supplies/{id}', [FurnituresController::class, 'updateFurniture']);
Route::delete('/api/supplies/{id}', [FurnituresController::class, 'deleteFurniture']);


Route::get('/api/orders', [OrdersController::class, 'getListOrders']);
Route::get('/api/orders/{id}', [OrdersController::class, 'getDetailsOrders']);
Route::post('/api/orders', [OrdersController::class, 'addOrder']);
Route::put('/api/orders/{id}', [OrdersController::class, 'updateOrders']);
Route::delete('/api/orders/{id}', [OrdersController::class, 'deleteOrders']);
