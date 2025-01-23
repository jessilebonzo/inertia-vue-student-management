<?php

use App\Http\Controllers\Api\SectionController;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('api/sections', [SectionController::class, 'index']);

Route::get('sections', SectionController::class);
