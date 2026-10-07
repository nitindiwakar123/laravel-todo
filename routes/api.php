<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthController;

// Auth Routes
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::middleware('auth:api')->get('/auth/me', [AuthController::class, 'me']);

// Todos Routes
Route::middleware('auth:api')->get('/todos', [TodoController::class, 'index']);
Route::middleware('auth:api')->get('/todos/{id}', [TodoController::class, 'show']);
Route::middleware('auth:api')->post(
    '/todos',
    [TodoController::class, 'store']
);
Route::middleware('auth:api')->patch('/todos/{id}', [TodoController::class, 'update']);
Route::middleware('auth:api')->delete('/todos/{id}', [TodoController::class, 'destroy']);
Route::middleware('auth:api')->delete('/todos', [TodoController::class, 'erase']);

