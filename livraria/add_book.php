<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano_publicacao = $_POST['ano_publicacao'];

        $db = getDatabaseConnection();
        $stmt = $db->prepare("INSERT INTO livros (titulo, autor, ano_punlicacao) VALUES (?, ?, ?)");
        $stmt->execute([$titulo, $autor, $ano_publicacao]);

        header('Location: index.php');
        exit();
}
?>