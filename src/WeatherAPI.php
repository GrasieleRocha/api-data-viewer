<?php

namespace Src;
  
class WeatherAPI {
    private $apiUrl;
    private $apiKey;

    // Construtor que define a URL da API
    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
        // Recuperando a chave da API diretamente do arquivo .env
        $this->apiKey = env('WEATHER_API_KEY');
    }

    // Método para fazer a requisição à API e tratar a resposta
    public function getWeatherData($city) {
        $url = $this->apiUrl . "?q={$city}&appid={$this->apiKey}&units=metric&lang=pt_br"; // Exemplo com OpenWeather

        // Usando file_get_contents para fazer a requisição (se preferir cURL, pode trocar)
        $response = file_get_contents($url);

        // Se a resposta for válida, decodifica os dados JSON
        if ($response === FALSE) {
            throw new \Exception("Erro ao acessar a API.");
        }

        return json_decode($response, true); // Retorna os dados como array
    }
}
