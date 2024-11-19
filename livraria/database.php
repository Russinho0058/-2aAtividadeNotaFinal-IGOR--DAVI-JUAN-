<?php

function getDatabaseConnection() {
    $dbFile = 'tarefas.db';
    $db = new PDO("sqlite:$dbFile");
    $db->exec("CREATE TABLE IF NOT EXISTS tarefas (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        descricao TEXT NOT NULL,
        data_vencimento DATE NOT NULL,
        concluida INTEGER DEFAULT 0
    )");

    return $db;
}
?>