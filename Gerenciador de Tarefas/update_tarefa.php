<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $db = getDatabaseConnection();
    $stmt = $db->prepare("UPDATE tarefas SET concluida = 1 WHERE id = ?");
     $stmt->execute([$id]);

     header('Location: index.php');
     exit();
}
?>