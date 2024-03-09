<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipoUsuario = isset($_POST['tipoUsuario']) ? $_POST['tipoUsuario'] : '0'; // Garante que o tipoUsuario não seja nulo
    
    // Log dos dados recebidos do formulário
    error_log("Dados do formulário recebidos: Nome: $nome, Email: $email, Senha: $senha, Tipo de Usuário: $tipoUsuario");

    $sql = "INSERT INTO usuarios (nome, email, senha, tipo_usuario) VALUES (?, ?, ?, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email, $senha]);

    // Verifica se a inserção foi bem-sucedida
    if ($stmt->rowCount() > 0) {
        error_log("Inserção no banco de dados bem-sucedida.");
    } else {
        error_log("Falha ao inserir no banco de dados.");
    }

    // Redireciona o usuário de volta para a página index.php
    header("Location: ../index.php");
}
?>