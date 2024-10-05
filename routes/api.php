<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::post('/weather', [WeatherController::class, 'store']);
Route::get('/weather/{city}', [WeatherController::class, 'showWeather']);
