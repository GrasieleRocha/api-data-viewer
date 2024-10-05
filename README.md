# Consulta Clima
![in Development](https://img.shields.io/badge/Grasiele%20-%20Rocha-green) 


<br>


## Objetivo
Esta aplicação permite ao usuário consultar o clima de uma cidade selecionada, exibindo informações detalhadas sobre temperatura, visibilidade, velocidade do vento e uma breve descrição do clima. Os dados são obtidos da API Weather API OpenWeather.

<br>

## Funcionalidade

- O projeto permite selecionar uma cidade e buscar os dados climáticos da mesma.


  <br>

## Ferramentas e Tecnologias Utilizadas


- **Front-End**: ![HTML Badge](https://img.shields.io/badge/HTML-E34F26?style=for-the-badge&logo=html5&logoColor=white) ![CSS Badge](https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white) ![JavaScript Badge](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

- **Back-End**: ![Laravel Badge](https://img.shields.io/badge/Laravel-EF3E30?style=for-the-badge&logo=laravel&logoColor=white) 

- **Banco de Dados**: ![PostgreSQL Badge](https://img.shields.io/badge/PostgreSQL-336791?style=for-the-badge&logo=postgresql&logoColor=white) 

- **Versionamento de Código**: ![Git Badge](https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white) 

- **Editor de Código**: ![Visual Studio Code Badge](https://img.shields.io/badge/Visual%20Studio%20Code-007ACC?style=for-the-badge&logo=visual-studio-code&logoColor=white) 

- **Hospedagem**: ![GitHub Badge](https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white)


    <br>

## Acesso ao Projeto

Para rodar o projeto localmente, siga os passos abaixo:

1. **Clone o repositório**:
   ```bash
   git clone https://github.com/GrasieleRocha/api-data-viewer
   ```

2. **Entre no diretório do projeto**:
   ```bash
   cd api-data-viewer
   ```

3. **Instale as dependências**:
   ```bash
   composer install
   ```

4. **Configure o arquivo `.env`**: copie o arquivo `.env.example` para `.env` e ajuste as variáveis de ambiente como a chave da API de clima e as credenciais do banco de dados PostgreSQL:
   ```bash
   cp .env.example .env
   ```

   Adicione a sua **chave de API de clima** na variável `WEATHER_API_KEY`.
   Configure também as variáveis de ambiente do banco de dados PostgreSQL conforme a sua configuração local, por exemplo:
     ```
     DB_CONNECTION=pgsql
     DB_HOST=127.0.0.1
     DB_PORT=5432
     DB_DATABASE=nome_do_banco
     DB_USERNAME=usuario
     DB_PASSWORD=senha
     ```

5. **Gere a chave da aplicação**:
   ```bash
   php artisan key:generate
   ```

6. **Execute as migrações (se necessário)**:
   ```bash
   php artisan migrate
   ```

7. **Inicie o servidor de desenvolvimento**:
   ```bash
   php artisan serve
   ```

8. **Acesse o projeto no navegador**:
   [http://localhost:8000](http://localhost:8000)

<br>

## API Utilizada
Esta aplicação utiliza a [Weather API](https://www.weatherapi.com/). Para obter uma chave de API, acesse o site e crie uma conta. Após gerar a chave, adicione-a ao arquivo `.env`.

<br>

## Inserir dados no banco  usando o Tinker

Siga os passos abaixo para inserir dados no banco de dados usando o Tinker no Laravel:

1. **Abra o terminal no diretório do seu projeto Laravel.**

2. **Inicie o Tinker**, o ambiente interativo do Laravel para testar comandos do Eloquent:
   ```bash
   php artisan tinker
   
3. **Insira um novo registro de clima**:
   Execute os seguintes comandos para criar um novo registro de clima no banco de dados:
   ```php
   use App\Models\Weather;
   use Carbon\Carbon; // Para manipulação de datas

   $weather = new Weather();

   // Atribuindo valores às colunas
   $weather->city = 'São Paulo';
   $weather->temperature = 24; // Temperatura em graus Celsius
   $weather->visibility = 10; // Exemplo de visibilidade em km
   $weather->wind_speed = 15; // Exemplo de velocidade do vento em km/h
   $weather->description = 'Céu limpo';
   $weather->timestamp = Carbon::now(); // Usando a data e hora atual

   // Salvando o registro no banco de dados
   $weather->save();
   ```
4. Aperte a tecla enter para salvar os dados no banco;

5. **Verifique se os dados foram inseridos**:
   Para confirmar que os dados foram salvos corretamente, você pode usar o comando:
   ```php
   \App\Models\Weather::all();
   ```
6. Aperte a tecla enter para confirmar a inclusão dos dados;
7. Após terminar, digite `exit` ou pressione `Ctrl + C` para sair do Tinker.
   
<br>

-BANCO DE DADOS

![banco](https://github.com/user-attachments/assets/3fd0a439-039e-4d70-9d44-d6c93ac7c11a)

<br>

## Capturas de Tela

### Interface do Projeto
Mobile e Web

![BOOST (3)](https://github.com/user-attachments/assets/2c90e802-a0ec-4456-a5f8-398e41aee03a)

<br>

### Processo de Desenvolvimento


![How to Develop a Brand (4)](https://github.com/user-attachments/assets/69f484f9-2562-4379-9fd5-04a37506af96)


<br>

## Developer

[<img src="https://avatars.githubusercontent.com/u/104076058?v=4" width=115><br><sub>Grasiele Rocha</sub>](https://github.com/GrasieleRocha) 
