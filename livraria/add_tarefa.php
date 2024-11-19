<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];
    $data_vencimento = $_POST['data_vencimento'];

    $db = getDatabaseCOnnection();
    $stmt = $db->prepare("INSERT INTO tarefas (descricao, data_vencimento) VALUES (?, ?)");
    $stmt->Execute([$descricao, $data_vencimento]);

    header('Location: index.php');
    exit();
}
?>