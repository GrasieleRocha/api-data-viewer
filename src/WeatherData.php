<?php

namespace Src;

class WeatherData {
    public $city;
    public $temperature;
    public $description;

    public function __construct($city, $temperature, $description) {
        $this->city = $city;
        $this->temperature = $temperature;
        $this->description = $description;
    }

    public function displayWeather() {
        return "A temperatura em {$this->city} é {$this->temperature}°C com {$this->description}.";
    }
}
