<?php
$host = 'localhost';
$dbname = 'banco';
$username = 'root';
$password = 'root';

// Estrutura inicial do BD
// CREATE DATABASE "banco";
// CREATE TABLE banco.usuarios (id INT NOT NULL AUTO_INCREMENT, email VARCHAR(255) NOT NULL , nome VARCHAR(255) NOT NULL , senha VARCHAR(255) NOT NULL , PRIMARY KEY (id))

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Não foi possível conectar ao banco de dados: " . $e->getMessage());
}
?>