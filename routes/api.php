<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\BookingController;

// AUTH
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);

// HOTEL
Route::get('hotels', [HotelController::class, 'index']);
Route::get('hotels/{hotel}', [HotelController::class, 'show']);

// ROOM
Route::get('hotels/{hotel}/rooms', [RoomController::class, 'index']);

// BOOKING
Route::middleware('auth:sanctum')->group(function () {
    Route::post('bookings', [BookingController::class, 'store']);
    Route::get('bookings', [BookingController::class, 'index']);
});
