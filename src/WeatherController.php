<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    private $apiUrl = "https://api.openweathermap.org/data/2.5/weather";
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env('WEATHER_API_KEY');
    }

    public function showWeather($city)
    {
        $url = "{$this->apiUrl}?q={$city}&appid={$this->apiKey}&units=metric&lang=pt_br";
        $response = file_get_contents($url);

        if ($response === FALSE) {
            return view('weather')->with('error', 'Erro ao acessar a API.');
        }

        $weatherData = json_decode($response, true);

        if (isset($weatherData['main'])) {
            return view('weather', ['weather' => $weatherData]);
        } else {
            return view('weather')->with('error', 'Cidade não encontrada.');
        }
    }
}
