<?php

// app/Http/Controllers/WeatherController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    private $apiUrl = "https://api.openweathermap.org/data/2.5/weather"; // Exemplo usando OpenWeather
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env('WEATHER_API_KEY'); // A chave da API no arquivo .env
    }

    public function showWeather($city)
    {
        // Montando a URL da API com a cidade e chave
        $url = "{$this->apiUrl}?q={$city}&appid={$this->apiKey}&units=metric&lang=pt_br";

        // Fazendo a requisição à API
        $response = file_get_contents($url);

        // Se a resposta for válida, decodifica os dados JSON
        if ($response === FALSE) {
            return view('weather')->with('error', 'Erro ao acessar a API.');
        }

        $weatherData = json_decode($response, true); // Retorna os dados como array

        // Verifica se a cidade foi encontrada
        if (isset($weatherData['main'])) {
            return view('weather', ['weather' => $weatherData]);
        } else {
            return view('weather')->with('error', 'Cidade não encontrada.');
        }
    }
}
