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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/jobs/{token}', [App\Http\Controllers\API\JobController::class, 'index']);
Route::get('/jobs/{token}/{job_id}', [App\Http\Controllers\API\JobController::class, 'singleJob']);
Route::post('/jobs/apply', [App\Http\Controllers\API\JobController::class, 'store']);
