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




Route::prefix('v1')->group(function () {

    Route::get('user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');


    Route::get('careers', [CareerController::class, 'index']);
    Route::get('faculties', [FacultyController::class, 'index']);
    Route::get('semesters', [SemesterController::class, 'index']);

    Route::middleware('auth:sanctum')->group(function () {

        Route::apiResource('careers', CareerController::class)->only(['store', 'show', 'update', 'destroy']);
        Route::apiResource('faculties', FacultyController::class)->only(['store', 'show', 'update', 'destroy']);
        Route::apiResource('semesters', SemesterController::class)->only(['store', 'show', 'update', 'destroy']);
        Route::apiResource('students', StudentController::class);
        Route::apiResource('priorities', PriorityController::class);
        Route::apiResource('statuses', StatusController::class);
        Route::apiResource('tasks', TaskController::class);
    });
});
