// Arquivo: config/db_connect.php

<?php
// Defina as informações de conexão com o banco de dados
$host = '127.0.0.1';        // Ou o endereço do seu servidor de banco de dados
$dbname = 'weather_data';    // Defina corretamente o nome do banco de dados
$user = 'postgres';          // Defina o nome de usuário correto
$pass = '120488';            // Defina a senha correta
$port = '5432';              // Porta do banco de dados (5432 é o padrão do PostgreSQL)

// Conectar ao banco de dados
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");

if (!$conn) {
    die("Erro ao conectar ao banco de dados: " . pg_last_error());
}

echo "Conexão estabelecida com sucesso!";
?>
