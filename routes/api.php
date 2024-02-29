<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getTasks', [TaskController::class, 'getTasks']);
Route::post('storeTask', [TaskController::class, 'storeTask']);
Route::post('updateTask/{id}', [TaskController::class, 'updateTask']);
Route::post('removeTask/{id}', [TaskController::class, 'removeTask']);
Route::post('completeTask/{id}', [TaskController::class, 'completeTask']);

Route::post('createGroup', [TaskController::class, 'createGroup']);
Route::get('getGroups', [TaskController::class, 'getGroups']);
Route::post('removeGroup/{id}', [TaskController::class, 'removeGroup']);

Route::post('createPermission', [TaskController::class, 'createPermission']);
Route::get('getPermissions', [TaskController::class, 'getPermissions']);
Route::post('removePermission/{id}', [TaskController::class, 'removePermission']);

