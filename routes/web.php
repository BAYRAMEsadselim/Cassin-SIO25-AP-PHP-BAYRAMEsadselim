<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\JoueurController;

Route::resource('joueurs', JoueurController::class);