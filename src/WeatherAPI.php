<?php

namespace Src;

class WeatherAPI {
    private $apiUrl;
    private $apiKey;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
        $this->apiKey = env('WEATHER_API_KEY');
    }

    public function getWeatherData($city) {
        $url = $this->apiUrl . "?q={$city}&appid={$this->apiKey}&units=metric&lang=pt_br";
        $response = file_get_contents($url);

        if ($response === FALSE) {
            throw new \Exception("Erro ao acessar a API.");
        }

        return json_decode($response, true);
    }
}
