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
Route::get('feedback/settings', [\App\Http\Controllers\FeedBackSettingsController::class, 'index'])
    ->name('feedback.settings.index');
Route::patch('feedback/settings', [\App\Http\Controllers\FeedBackSettingsController::class, 'update'])
    ->name('feedback.settings.update');

Route::get('feedback', [\App\Http\Controllers\FeedBackController::class, 'index'])
    ->name('feedback');
Route::post('feedback', [\App\Http\Controllers\FeedBackController::class, 'store'])
    ->name('feedback.store');
