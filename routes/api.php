<?php

use App\Http\Controllers\Api\V1\CompleteTaskController;
use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\API_Controller\StudentController;
use Illuminate\Http\Request;
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

Route::prefix('v1')->group(function (){
    Route::apiResource('/tasks', TaskController::class);
    Route::patch('tasks/{task}/complete', CompleteTaskController::class);
});


/*Route::get('index',[TaskController::class, 'Index']);*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/message', [StudentController::class, 'message']);

Route::prefix('students')->group(function (){
    Route::get('/view', [StudentController::class, 'view']);
    Route::post('/store', [StudentController::class, 'store']);
    Route::post('/update/{id}', [StudentController::class, 'update']);
    Route::delete('/delete/{id}', [StudentController::class, 'delete']);
});


