<?php
namespace Src;

class WeatherData {
    public $cidade;
    public $temperatura;
    public $descrição;

    public function __construct($cidade, $temperatura, $descrição) {
        $this->cidade = $cidade;
        $this->temperatura = $temperatura;
        $this->descrição = $descrição;
    }

    public function displayWeather() {
        return "A temperatura em {$this->cidade} é {$this->temperatura}°C com {$this->descrição}.";
    }
}
