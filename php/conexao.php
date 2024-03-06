<?php
// Estrutura inicial do BD
// UWAMP (MYSQL):CREATE DATABASE "banco";
// UWAMP (MYSQL): CREATE TABLE banco.usuarios (id INT NOT NULL AUTO_INCREMENT, email VARCHAR(255) NOT NULL , nome VARCHAR(255) NOT NULL , senha VARCHAR(255) NOT NULL , PRIMARY KEY (id))
// SQLITE3 (CLI): sqlite3 banco.db "CREATE TABLE usuarios (id INTEGER PRIMARY KEY AUTOINCREMENT, email TEXT NOT NULL, nome TEXT NOT NULL, senha TEXT NOT NULL);"
// Parar servir o projeto, use: php -S localhost:8000

try {
    $pdo = new PDO("sqlite:/home/administrador/Documents/senac/PI/www/database/banco.db");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Não foi possível conectar ao banco de dados: " . $e->getMessage());
}
?>