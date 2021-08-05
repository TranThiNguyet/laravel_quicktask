<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LanguageController;

Route::get('/', function () {
    return view('tasks'); 
})->name('/');

Route::get('change-language/{language}', [LanguageController::class, 'changeLanguage'])->name('change-language');

Route::resource('tasks', 'TaskController');
