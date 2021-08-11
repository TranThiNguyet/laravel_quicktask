<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class,'index'])->name('home');

Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language/{language}', [LanguageController::class, 'changeLanguage'])->name('change-language');
    Route::resource('tasks', TaskController::class);
});
