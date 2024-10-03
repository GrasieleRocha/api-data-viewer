<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Clima</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container" id="weatherContainer">
        <h1>Consulte o Clima</h1>
        <div class="city-select">
            <label for="citySelect">Escolha a cidade:</label>
            <select id="citySelect">
                <option value="">------------ </option>
            </select>
        </div>
        <div class="weather-info">
            <div class="card">
                <p id="city">Cidade: --</p>
            </div>
            <div class="card">
                <p id="temperature">Temperatura: -- °C</p>
            </div>
            <div class="card">
                <p id="visibility">Visibilidade: -- km</p>
            </div>
            <div class="card">
                <p id="windspeed">Velocidade do Vento: -- m/s</p>
            </div>
            <div class="card">
                <p id="description">Descrição: --</p>
            </div>
        </div>
    </div>
    <script>
        function populateCities() {
            const cities = [
                'Acrelândia', 'Água Boa', 'Águas Lindas de Goiás', 'Alagoinhas', 'Alfredo Chaves', 'Arapiraca', 'Araraquara', 'Aracaju',
                'Araguari', 'Araxá', 'Arco-Íris', 'Assis', 'Astorga', 'Atibaia', 'Belo Horizonte', 'Brasília', 'Campo Grande', 'Camaçari',
                'Canoas', 'Cariacica', 'Curitiba', 'Fortaleza', 'Goiânia', 'Joinville', 'Macapá', 'Manaus', 'Maringá', 'Natal', 'Palmas',
                'Porto Alegre', 'Porto Velho', 'Recife', 'Rio de Janeiro', 'Salvador', 'São Paulo', 'São Bernardo do Campo', 'São José',
                'São José dos Campos', 'São Luís', 'São Vicente', 'Serra', 'Sorocaba', 'Vitória'
            ];
            const selectElement = document.getElementById('citySelect');
            cities.forEach(city => {
                const option = document.createElement('option');
                option.value = city;
                option.textContent = city;
                selectElement.appendChild(option);
            });
        }

        function getWeatherData() {
            const cityName = document.getElementById('citySelect').value;
            if (!cityName) {
                alert('Por favor, selecione uma cidade.');
                return;
            }
            const apiKey = 'YOUR_API_KEY';
            const url = `https://api.openweathermap.org/data/2.5/weather?q=${cityName},BR&appid=162e6102723d177e604ddf8c493ce8a9&units=metric&lang=pt_br`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.cod !== 200) {
                        alert('Erro ao obter os dados do clima.');
                        return;
                    }
                    const city = data.name;
                    const temperature = data.main.temp;
                    const visibility = data.visibility / 1000;
                    const windSpeed = data.wind.speed;
                    const description = data.weather[0].description;

                    document.getElementById('city').textContent = `Cidade: ${city}`;
                    document.getElementById('temperature').textContent = `Temperatura: ${temperature} °C`;
                    document.getElementById('visibility').textContent = `Visibilidade: ${visibility} km`;
                    document.getElementById('windspeed').textContent = `Velocidade do Vento: ${windSpeed} m/s`;
                    document.getElementById('description').textContent = `Descrição: ${description}`;
                })
                .catch(error => {
                    console.error('Erro:', error);
                    alert('Ocorreu um erro ao buscar os dados da cidade.');
                });
        }

        const citySelect = document.getElementById('citySelect');
        citySelect.addEventListener('change', getWeatherData);
        window.onload = populateCities;
    </script>
</body>
</html>
