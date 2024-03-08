<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
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

<div class="container mt-3">
    <!-- Feed de imagens -->
    <div id="imageFeed_1" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="../img/3.jpg" class="d-block img-fluid" alt="Descrição da Imagem 1">
                <div class="circle" onclick="showDescription(this)"></div>
                <div class="description-box">Pessoas felizes</div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="../img/1.jpg" class="d-block img-fluid" alt="Descrição da Imagem 2">
                <div class="circle" onclick="showDescription(this)"></div>
                <div class="description-box">José e sua familia</div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="../img/2.jpg" class="d-block img-fluid" alt="Descrição da Imagem 3">
                <div class="circle" onclick="showDescription(this)"></div>
                <div class="description-box">Um belo jardim</div>
            </div>
        </div>
        <!-- Controls -->
        <a class="carousel-control-prev" href="#imageFeed_1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#imageFeed_1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>
    <div class="like-dislike-buttons">
    <button type="button" class="btn btn-outline-primary">Like</button>
    <button type="button" class="btn btn-outline-secondary">Dislike</button>
    <button type="button" class="btn btn-outline-info" onclick="enableCircleAdding(this)">Adicionar Círculo</button>
    </div>
</div>

<!-- JavaScript para mostrar a descrição -->
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
    console.log(xPos);
    console.log(yPos);

    var circle = document.createElement('div');
    circle.className = 'circle';
    circle.style.left = xPos + 'px';
    circle.style.top = yPos + 'px';

    // Aqui você pode definir o que acontece quando o círculo é clicado
    circle.onclick = function() {
        showDescription(this);
    };

    carouselItem.appendChild(circle);

    // Desabilitar o clique adicional na imagem
    carouselItem.querySelector('img').onclick = null;
}

function enableCircleAdding(button) {
    // Encontra o container mais próximo
    var container = button.closest('.container');
    // Encontra o item do carrossel que está ativo
    var carouselItem = container.querySelector('.carousel-item.active');
    // Encontra a imagem dentro do item ativo
    var img = carouselItem.querySelector('img');
    // Adiciona o evento de clique na imagem
    img.onclick = function(event) {
        addCircle(event, carouselItem);
    };
}
</script>

<!-- Bootstrap JS e dependências -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>