<?php include 'php/conexao.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Simples</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>CRUD Simples</h1>

    <!-- Formulário para adicionar novo usuário -->
    <form method="POST" action="php/create.php">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Adicionar</button>
    </form>

    <!-- Listar usuários -->
    <h2>Usuários</h2>
    <?php
    $sql = "SELECT * FROM usuarios";
    $result = $pdo->query($sql);

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<div>";
            echo "Nome: " . $row['nome'] . "<br>";
            echo "Email: " . $row['email'];
            echo " <a href='php/update.php?id=" . $row['id'] . "'>Editar</a>";
            echo " <a href='php/delete.php?id=" . $row['id'] . "'>Deletar</a>";
            echo "</div>";
        }
    } else {
        echo "Nenhum usuário encontrado.";
    }
    ?>
</body>
</html>