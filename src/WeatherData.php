<?php

namespace Src;

class WeatherData {
    public $city;
    public $temperature;
    public $description;

    // Construtor para inicializar as propriedades
    public function __construct($city, $temperature, $description) {
        $this->city = $city;
        $this->temperature = $temperature;
        $this->description = $description;
    }

    // Método para exibir os dados de maneira amigável
    public function displayWeather() {
        return "A temperatura em {$this->city} é {$this->temperature}°C com {$this->description}.";
    }
}
