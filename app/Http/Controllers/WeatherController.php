<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;

class WeatherController extends Controller
{

    public function store(Request $request)
    {
 
        $request->validate([
            'city' => 'required|string|max:255',
            'temperature' => 'required|numeric',
            'visibility' => 'required|numeric',
            'wind_speed' => 'required|numeric',
            'description' => 'required|string|max:255',
            'timestamp' => 'required|date',
        ]);

        $weather = Weather::create($request->all());

    }
}
