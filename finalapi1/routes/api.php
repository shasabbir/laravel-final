<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DeptController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/student/getall', [StudentController::class, 'getall']);
Route::post('/student/create', [StudentController::class, 'create']);
Route::post('/student/update/{id}', [StudentController::class, 'update']);
Route::post('/student/delete', [StudentController::class, 'delete']);

Route::get('/department/getall', [DeptController::class, 'getall']);
Route::get('/department/get/{id}', [DeptController::class, 'get']);
Route::post('/department/create', [DeptController::class, 'create']);
Route::post('/department/update/{id}', [DeptController::class, 'update']);
Route::post('/department/delete', [DeptController::class, 'delete']);

