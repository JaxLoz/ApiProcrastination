<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    
    Route::apiResource('faculties', FacultyController::class);
    Route::apiResource('careers', CareerController::class);
    Route::apiResource('semesters', SemesterController::class);
    Route::apiResource('students', StudentController::class);
    Route::apiResource('priorities', PriorityController::class);
    Route::apiResource('statuses', StatusController::class);
    Route::apiResource('tasks', TaskController::class);
});
