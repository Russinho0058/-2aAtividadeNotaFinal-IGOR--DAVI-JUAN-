<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $db = getDatabaseConnection();
    $stmt = $db->prepare("DELETE FROM livros WHERE id = ?");
     $stmt_.execute([$id]);

     header('Location: index.php');
     exit();
}