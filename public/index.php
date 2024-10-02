<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Clima</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <div class="container">
        <h1>Consulte o Clima</h1>

        <!-- Campo para selecionar a cidade -->
        <div class="city-select">
            <label for="citySelect">Escolha a cidade:</label>
            <select id="citySelect">
                <!-- Opções de cidades serão preenchidas aqui -->
                <option value="">Selecione uma cidade</option>
            </select>
        </div>

        <!-- Campos de exibição de dados -->
        <div class="weather-info">
            <p id="city">Cidade: --</p>
            <p id="temperature">Temperatura: -- °C</p>
            <p id="visibility">Visibilidade: -- km</p>
            <p id="windspeed">Velocidade do Vento: -- m/s</p>
            <p id="description">Descrição: --</p>
        </div>

    </div>

    <script>
        // Função para preencher o select com cidades do Brasil
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

        // Função para obter dados do clima da API
        function getWeatherData() {
            const cityName = document.getElementById('citySelect').value;  // Pega o nome da cidade selecionada

            // Verifica se uma cidade foi escolhida
            if (!cityName) {
                alert('Por favor, selecione uma cidade.');
                return;
            }

            const apiKey = 'YOUR_API_KEY'; // Substitua pela sua chave da API
            const url = `https://api.openweathermap.org/data/2.5/weather?q=${cityName},BR&appid=162e6102723d177e604ddf8c493ce8a9&units=metric&lang=pt_br`;

            // Faz a requisição para a API de clima
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Verifica se houve erro na resposta da API
                    if (data.cod !== 200) {
                        alert('Erro ao obter os dados do clima.');
                        return;
                    }

                    // Extrai os dados do clima
                    const city = data.name;  // Nome da cidade
                    const temperature = data.main.temp;  // Temperatura em °C
                    const visibility = data.visibility / 1000;  // Visibilidade em km
                    const windSpeed = data.wind.speed;  // Velocidade do vento em m/s
                    const description = data.weather[0].description;  // Descrição do clima

                    // Preenche os campos de informações do clima
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

        // Ao mudar a cidade no select, chama a função para buscar os dados
        const citySelect = document.getElementById('citySelect');
        citySelect.addEventListener('change', getWeatherData);

        // Popula o select com as cidades ao carregar a página
        window.onload = populateCities;

    </script>

</body>

</html>
