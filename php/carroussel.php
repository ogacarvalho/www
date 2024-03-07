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
        /* Adicione mais estilos conforme necessário */
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
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="../img/1.jpg" class="d-block img-fluid" alt="Descrição da Imagem 2">
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="../img/2.jpg" class="d-block img-fluid" alt="Descrição da Imagem 3">
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
    </div>
</div>

<div class="container mt-3">
    <!-- Feed de imagens -->
    <div id="imageFeed_2" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="../img/3.jpg" class="d-block img-fluid" alt="Descrição da Imagem 1">
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="../img/1.jpg" class="d-block img-fluid" alt="Descrição da Imagem 2">
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="../img/2.jpg" class="d-block img-fluid" alt="Descrição da Imagem 3">
            </div>
        </div>
        <!-- Controls -->
        <a class="carousel-control-prev" href="#imageFeed_2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#imageFeed_2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>
    <div class="like-dislike-buttons">
        <button type="button" class="btn btn-outline-primary">Like</button>
        <button type="button" class="btn btn-outline-secondary">Dislike</button>
    </div>
</div>

<div class="container mt-3">
    <!-- Feed de imagens -->
    <div id="imageFeed_3" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="../img/3.jpg" class="d-block img-fluid" alt="Descrição da Imagem 1">
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="../img/1.jpg" class="d-block img-fluid" alt="Descrição da Imagem 2">
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="../img/2.jpg" class="d-block img-fluid" alt="Descrição da Imagem 3">
            </div>
        </div>
        <!-- Controls -->
        <a class="carousel-control-prev" href="#imageFeed_3" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#imageFeed_3" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>
    <div class="like-dislike-buttons">
        <button type="button" class="btn btn-outline-primary">Like</button>
        <button type="button" class="btn btn-outline-secondary">Dislike</button>
    </div>
</div>



<!-- Bootstrap JS e dependências -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>