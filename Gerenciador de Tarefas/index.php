<?php
require 'database.php';

$db = getDatabaseConnection();
$query = $db->query("SELECT * FROM tarefas");
$tarefas = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas</title>
</head>
<body>
    <h2>Adicionar Tarefa</h2>
    <form action="add_tarefa.php" method="post">
        <label for="descricao">Descrição:</ladel>
        <input type="text" name="descricao" required>
        <br>
        <label for="data_vencimento">Data de Vencimento: </label>
        <input type="date" name="data_vencimento" required>
        <br>
        <buttton type="submit">Adicionar Tarefa</button>
    </form>

    <h2>Tarefas Não Concluídas</h2>
    <ul>
        <?php foreach ($tarefas as $tarefa): ?>
            <?php if (!$tarefa['concluida']): ?>
                <li>
                    <?= htmlspecialchars($tarefa['descricao']) ?> (Vencimento: <?= htmlspecialchars($tarefa['data_vencimento']) ?>)
                    <form action="update_tarefa.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                        <button type="submit">Marcar como Concluída</button>
                    </form>
                    <form action="delete_tarefa.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                        <button type="submit">Excluir</button>
                    </form>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <h2>Tarefas Concluídas</h2>
    <ul>
        <?php foreach ($tarefas as $tarefa): ?>
            <?php if ($tarefa['concluida']): ?>
                <li>
                    <?= htmlspecialchars($tarefa['descricao']) ?> (Vencimento: <?= htmlspecialchars($tarefa['data_vencimento']) ?>)
                    <form action="delete_tarefa.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                        <button type="submit">Excluir</button>
                    </form>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</body>
</html>