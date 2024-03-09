<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Feed de Imagens</title>
    <style>
        .image-post {
            margin-bottom: 20px;
        }
        .img-fluid {
            max-height: 400px;
            width: auto;
            display: block;
            margin: 0 auto;
        }
        body {
            background-color: #f0f0f0;
        }
        .like-dislike-buttons {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        /* Estilos para o círculo e a descrição */
        .carousel-item {
            position: relative;
        }
        .circle {
            position: absolute;
            width: 50px;
            height: 50px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            cursor: pointer;
            top: 100px;
            right: 170px;
        }

        .description-box {
            display: none;
            position: absolute;
            background-color: white;
            padding: 10px;
            border: 1px solid black;
            z-index: 100;
            top: 70px;
            right: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="../img/header.gif" alt="Logo" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
<div class="container mt-3">
    <div id="imageFeed_1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">    
            <div class="carousel-item active">
                <img src="../img/3.jpg" class="d-block img-fluid" alt="Descrição da Imagem 1">
            </div>
            <div class="carousel-item">
                <img src="../img/1.jpg" class="d-block img-fluid" alt="Descrição da Imagem 2">
            </div>
            <div class="carousel-item">
                <img src="../img/2.jpg" class="d-block img-fluid" alt="Descrição da Imagem 3">
            </div>
        </div>

        <a class="carousel-control-prev" href="#imageFeed_1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#imageFeed_1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>
    <?php
        session_start();
        $mostrarAdicionarCirculo = isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 1;
    ?>
    <div class="like-dislike-buttons">
        <button type="button" class="btn btn-outline-primary">Like</button>
        <button type="button" class="btn btn-outline-secondary">Dislike</button>
        <?php if ($mostrarAdicionarCirculo): ?>
            <button type="button" class="btn btn-outline-info" onclick="enableCircleAdding(this)">Adicionar Círculo</button>
        <?php endif; ?>
    </div>
</div>
<script>
function showDescription(circle) {
    
    var descriptionBox = circle.nextElementSibling;
    if (descriptionBox.style.display === "none") {
        descriptionBox.style.display = "block";
    } else {
        descriptionBox.style.display = "none";
    }
}

function addCircle(event, carouselItem) {
    var xPos = event.offsetX;
    var yPos = event.offsetY;

    var userText = prompt("Por favor, insira sua frase personalizada para esta imagem:", "Descrição da imagem");
    if (userText === null || userText === "") {
        return;
    }

    var circle = document.createElement('div');
    circle.className = 'circle';
    circle.style.left = xPos + 'px';
    circle.style.top = yPos + 'px';

    var descriptionBox = document.createElement('div');
    descriptionBox.className = 'description-box';
    descriptionBox.style.display = 'none';
    descriptionBox.textContent = userText;

    descriptionBox.style.left = (xPos + 50) + 'px';
    descriptionBox.style.top = yPos + 'px';

    circle.onclick = function() {
        if (descriptionBox.style.display === "none") {
            descriptionBox.style.display = "block";
        } else {
            descriptionBox.style.display = "none";
        }
    };

    carouselItem.appendChild(circle);
    carouselItem.appendChild(descriptionBox);
    carouselItem.querySelector('img').onclick = null;
}

function enableCircleAdding(button) {
    var container = button.closest('.container');
    var carouselItem = container.querySelector('.carousel-item.active');
    var img = carouselItem.querySelector('img');
    img.onclick = function(event) {
        addCircle(event, carouselItem);
    };
}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>