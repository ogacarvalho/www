<?php include 'php/conexao.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inclua o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="/img/logo_figma.png">
    <title>Login e Cadastro</title>
    <style>
        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background-color: #FFFFFF;
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
        .form-signin {
            width: 300px; 
            margin: auto;
            text-align: center; 
        }

        .form-signin input[type="text"],
        .form-signin input[type="email"],
        .form-signin input[type="password"] {
            width: calc(100% - 26px); 
            height: 52px;
            border: 3px solid #000000;
            background: #11111111;
            color: #FFFFTF;
            padding: 10px;
            margin-bottom: 10px;
            display: block; 
            margin: 15px auto; 
        }
        .btn-custom {
        width: 151px;
        height: 52px;
        top: 320px;
        left: 59px;
        border-radius: 30px 0px 0px 30px;
        border: 2px solid #000000;
        background: #000000;
        color: #FFFFFF;
        }

        /* Estilos para o botão Login */
        .btn-custom:focus,
        .btn-custom:hover {
        background-color: #000000;
        color: #FFFFFF;
        }

        .btn-custom:focus:not(:focus-visible) {
        box-shadow: none;
        }

        .btn-custom + .btn {
            margin-left: -2px; /* Para corrigir a separação entre os botões */
            border-radius: 0px 30px 30px 0px;
        }

        .btn-login-text {
            width: 125px;
            height: 32px;
            top: 332px;
            left: 220px;
            font-size: 18px;
            font-weight: 700;
            line-height: 32px;
            letter-spacing: 0em;
            text-align: left;
            color: #FFFFFF;
        }

        /* Estilos para o botão Cadastro */
        .btn-cadastro {
            width: 151px;
            height: 52px;
            top: 372px;
            left: 359px;
            border-radius: 30px 0px 0px 30px;
            border: 2px solid #B1B1B1;
            background: #FFFFFF;
            
        }

        .btn-cadastro-text {
            width: 125px;
            height: 32px;
            top: 332px;
            left: 220px;
            font-size: 18px;
            font-weight: 700;
            line-height: 32px;
            letter-spacing: 0em;
            text-align: left;
            color: #B1B1B1;
            background: #FFFFFF;
            border: none;
            border-radius: 5px;
        }

        .btn-cadastro-text:focus,
        .btn-cadastro-text:hover {
            background-color: #FFFFFF;
            color: #B1B1B1;
        }

        .btn-cadastro-text:focus:not(:focus-visible) {
            box-shadow: none;
        }

        .btn-entrar {
            width: 156px;
            height: 52px;
            top: 558px;
            left: 128px;
            border: 3px solid #000000;         
            font-size: 18px;
            font-weight: 700;
            line-height: 32px;
            letter-spacing: 0em;
            border: 2px solid #000000;
            background: #000000;
            color: #FFFFFF;
        }

        .btn-entrar-text {
            width: 125px;
            height: 32px;
            top: 332px;
            left: 220px;
            font-size: 18px;
            font-weight: 700;
            line-height: 32px;
            letter-spacing: 0em;
            text-align: left;
            color: #FFFFFF;
        }

        
    </style>
    <script>
        function toggleForm(isLoginSelected) {
            document.getElementById('loginForm').style.display = isLoginSelected ? 'block' : 'none';
            document.getElementById('registerForm').style.display = isLoginSelected ? 'none' : 'block';
        }
    </script>
</head>
<body onload="toggleForm(true)">

<div class="container text-center">
    <div class="mb-4">
        <img src="/img/logo_figma.png" alt="Logo" class="mb-4">
    </div>
    <div class="toggle-group" role="group" aria-label="Alternar entre Login e Cadastro">
        <button type="button" class="btn btn-custom" id="loginToggle" onclick="toggleForm(true)">
            <span class="btn-login-text">LOGIN</span>
        <button type="button" class="btn btn-cadastro" id="registerToggle" onclick="toggleForm(false)">
        <span class="btn-cadastro-text">CADASTRO</span>
    </div>

    <!-- Formulário de Login -->
    <div id="loginForm" class="row">
        <div class="col">
        <form class="form-signin" action="php/login.php" method="post">
                <label for="inputEmail" class="sr-only">Endereço de email</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="E-MAIL" required autofocus>
                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="SENHA" required>
                <button class="btn btn-lg btn-primary btn-entrar" type="submit">
                    <span class="btn-entrar-text">Entrar</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Formulário de Cadastro -->
    <div id="registerForm" class="row" style="display: none;">
        <div class="col">
            <form class="form-signin" action="php/registrar.php" method="post">
                <label for="inputName" class="sr-only">Nome completo</label>
                <input type="text" id="inputName" name="nome" class="form-control" placeholder="Nome completo" required autofocus>
                <label for="inputName" class="sr-only">E-mail</label>
                <input type="email" id="inputName" name="email" class="form-control" placeholder="Email" required autofocus>
                <label for="inputName" class="sr-only">Senha</label>
                <input type="password" id="inputName" name="senha" class="form-control" placeholder="Senha" required autofocus>
    
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoUsuario" id="tipoComum" value="0" checked>
                        <label class="form-check-label" for="tipoComum">Usuário Comum</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoUsuario" id="tipoColaborador" value="1">
                        <label class="form-check-label" for="tipoColaborador">Colaborador</label>
                    </div>
                </div>

                <button class="btn btn-lg btn-primary btn-entrar" type="submit">
                    <span class="btn-entrar-text">Cadastrar</span>
                </button>
            </form>
        </div>
    </div>
    
    <p class="mt-5 mb-3 text-muted text-center">Além da Visão &copy; 2024</p>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>