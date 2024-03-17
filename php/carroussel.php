<?php
session_start();

// Caminho para o banco de dados SQLite
$db = new SQLite3('/home/gc/Senac/www/database/banco.db');

$tipo_usuario = $_SESSION['tipo_usuario'] ?? 0;
$usuario_id = $_SESSION['usuario_id'] ?? 0;

// Inicializa um array para guardar os posts e suas fotos
$posts = [];

if ($tipo_usuario == 1) {
    // Usuário do tipo colaborador vê todas as fotos
    $results = $db->query("SELECT fotos.*, posts.post_id FROM fotos INNER JOIN posts ON fotos.post_id = posts.post_id");
} else {
    // Usuário comum vê apenas suas fotos, agrupadas por post
    $stmt = $db->prepare("SELECT fotos.*, posts.post_id FROM fotos INNER JOIN posts ON fotos.post_id = posts.post_id WHERE fotos.usuario_id = :usuario_id");
    $stmt->bindValue(':usuario_id', $usuario_id, SQLITE3_INTEGER);
    $results = $stmt->execute();
}

while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    $posts[$row['post_id']][] = $row; // Agrupa as fotos pelo post_id
}

$mostrarAdicionarCirculo = $tipo_usuario == 1;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Feed de Imagens</title>
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
    <?php if (count($posts) > 0): ?>
        <?php foreach ($posts as $postId => $fotos): ?>
            <?php if (count($fotos) === 1): ?>
                <?php foreach ($fotos as $foto): ?>
                    <img src="<?= htmlspecialchars($foto['caminho_imagem']) ?>" class="d-block img-fluid" alt="<?= htmlspecialchars($foto['descricao']) ?>">
                    <div class="like-dislike-buttons">
                        <button type="button" class="btn btn-outline-primary">Like</button>
                        <button type="button" class="btn btn-outline-secondary">Dislike</button>
                        <?php if ($mostrarAdicionarCirculo): ?>
                            <button type="button" class="btn btn-outline-info" onclick="enableCircleAdding(this)">Adicionar Círculo</button>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
            <div id="carousel<?= htmlspecialchars($postId) ?>" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach ($fotos as $index => $foto): ?>
                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                            <img src="<?= htmlspecialchars($foto['caminho_imagem']) ?>" class="d-block img-fluid" alt="<?= htmlspecialchars($foto['descricao']) ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#carousel<?= htmlspecialchars($postId) ?>" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carousel<?= htmlspecialchars($postId) ?>" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
            <div class="like-dislike-buttons">
                        <button type="button" class="btn btn-outline-primary">Like</button>
                        <button type="button" class="btn btn-outline-secondary">Dislike</button>
                        <?php if ($mostrarAdicionarCirculo): ?>
                            <button type="button" class="btn btn-outline-info" onclick="enableCircleAdding(this)">Adicionar Círculo</button>
                        <?php endif; ?>
                    </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Não há imagens para exibir.</p>
    <?php endif; ?>
</div>

    <?php if ($tipo_usuario == 0): ?>
        <div class="botao-upload">
            <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="file-upload" class="custom-file-upload">
                <i class="fas fa-plus-circle"></i>
            </label>
            <input id="file-upload" type="file" name="photo[]" multiple/>
    </form>
</div>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.1/dist/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
</body>
</html>