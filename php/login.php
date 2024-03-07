<?php
session_start();

include 'conexao.php'; // Inclui o arquivo de conexão



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['password'] ?? '';

    if ($email != '' && $senha != '') {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Usuário encontrado
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            // Redireciona para a página desejada após o login
            header('Location: ./carroussel.php');
            exit;
        } else {
            // Usuário não encontrado ou senha incorreta
            $_SESSION['erro_login'] = 'E-mail ou senha incorretos.';
            header('Location: ./login.php');
            exit;
        }
    } else {
        // E-mail ou senha não preenchidos
        $_SESSION['erro_login'] = 'Preencha todos os campos.';
        header('Location: ../index.php');
        exit;
    }
} else {
    // Método não é POST
    header('Location: login.php');
    exit;
}
?>