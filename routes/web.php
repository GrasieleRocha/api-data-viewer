<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\WeatherController;

Route::post('/weather', [WeatherController::class, 'store'])->name('weather.store');
Route::get('/weather/{city}', [WeatherController::class, 'showWeather'])->name('weather.show');
