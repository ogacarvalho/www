<?php
// Servidor: php -S localhost:8000 : Necessário php-sqlite 

try {
    $pdo = new PDO("sqlite:/home/gc/Senac/www/database/banco.db");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Não foi possível conectar ao banco de dados: " . $e->getMessage());
}
?>