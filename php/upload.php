<?php
session_start(); // Inicia a sessão do PHP para acessar as variáveis de sessão

$db = new SQLite3('/home/gc/Senac/www/database/banco.db'); // Conexão com o banco de dados

// Verifica se um arquivo foi enviado
if (isset($_FILES['photo'])) {
    // Determina se múltiplos arquivos foram enviados
    $isMultiple = is_array($_FILES['photo']['name']);
    
    $fileCount = $isMultiple ? count($_FILES['photo']['name']) : 1;

    // Inicia uma transação
    $db->exec('BEGIN');

    // Cria um novo post
    $stmt = $db->prepare('INSERT INTO posts (usuario_id) VALUES (:usuario_id)');
    $stmt->bindValue(':usuario_id', $_SESSION['usuario_id'], SQLITE3_INTEGER);

    if ($stmt->execute()) {
        // Obtém o ID do post recém-criado
        $post_id = $db->lastInsertRowID();

        $uploadOk = 1; // Variável para verificar se o upload está OK

        // Processa cada arquivo enviado
        for ($i = 0; $i < $fileCount; $i++) {
            $fileName = $isMultiple ? $_FILES['photo']['name'][$i] : $_FILES['photo']['name'];
            $tmpName = $isMultiple ? $_FILES['photo']['tmp_name'][$i] : $_FILES['photo']['tmp_name'];

            $targetFile = "../uploads/" . time() . '-' . basename($fileName);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Verifique se o arquivo é uma imagem real
            $check = getimagesize($tmpName);
            if ($check !== false) {
                // Se tudo estiver OK, tente fazer o upload do arquivo
                if (move_uploaded_file($tmpName, $targetFile)) {
                    // Insere a imagem na tabela fotos com o post_id
                    $stmt = $db->prepare('INSERT INTO fotos (usuario_id, caminho_imagem, titulo, descricao, post_id) VALUES (:usuario_id, :caminho_imagem, :titulo, :descricao, :post_id)');
                    $stmt->bindValue(':usuario_id', $_SESSION['usuario_id'], SQLITE3_INTEGER);
                    $stmt->bindValue(':caminho_imagem', $targetFile, SQLITE3_TEXT);
                    $stmt->bindValue(':titulo', 'Título da Imagem', SQLITE3_TEXT);
                    $stmt->bindValue(':descricao', 'Descrição da Imagem', SQLITE3_TEXT);
                    $stmt->bindValue(':post_id', $post_id, SQLITE3_INTEGER);

                    if (!$stmt->execute()) {
                        $uploadOk = 0;
                        break;
                    }
                } else {
                    $uploadOk = 0;
                    break;
                }
            } else {
                $uploadOk = 0;
                break;
            }
        }

        if ($uploadOk == 1) {
            $db->exec('COMMIT'); // Confirma a transação se tudo estiver OK
            echo "Upload e inserção bem-sucedidos.";
            header('Location: ./carroussel.php');
            // Redirecione ou informe ao usuário que o upload foi bem-sucedido
        } else {
            $db->exec('ROLLBACK'); // Reverte a transação se algo der errado
            echo "Falha no upload.";
            // Informe ao usuário que o upload falhou
        }
    } else {
        echo "Erro ao criar post.";
        // Informe ao usuário que houve uma falha ao criar o post
    }
} else {
    echo "Nenhum arquivo foi enviado.";
    // Informe ao usuário que nenhum arquivo foi enviado
}
?>
