<?php
include 'conexao.php';

$sql = "SELECT * FROM usuarios";
$result = $pdo->query($sql);

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo $row['nome'] . " - " . $row['email'] . "<br>";
}
?>