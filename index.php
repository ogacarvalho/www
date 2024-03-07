<?php include 'php/conexao.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inclua o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login</title>
    <style>
        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background-color: #f7f7f7;
        }
        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
        .form-signin .checkbox {
            font-weight: 400;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col">
            <form class="form-signin" action="php/login.php" method="post">
                <h1 class="h3 mb-3 font-weight-normal text-center">Por favor, faça login</h1>
                <label for="inputEmail" class="sr-only">Endereço de email</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Endereço de email" required autofocus>
                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Senha" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                <p class="mt-5 mb-3 text-muted text-center">&copy; 2024</p>
            </form>
        </div>
    </div>
</div>

<!-- Inclua o JavaScript do Bootstrap e suas dependências -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>