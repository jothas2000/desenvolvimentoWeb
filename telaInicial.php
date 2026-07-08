<?php
require_once 'includes/auth.php';

$filename = 'data/db.txt';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Conteúdo</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Conteúdo do Arquivo</h1>

        <div class="top-bar">
            <a href="inserir.php" class="add-btn">+ Adicionar Nova Linha</a>
            <a href="logout.php" class="logout-btn">Sair</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Linha</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (file_exists($filename)): ?>
                    <?php $lines = file($filename, FILE_IGNORE_NEW_LINES); ?>
                    <?php foreach ($lines as $index => $linha): ?>
                        <?php if (trim($linha) !== ''): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= htmlspecialchars($linha) ?></td>
                                <td class="action-buttons">
                                    <form action="editar.php" method="GET" style="display:inline">
                                        <input type="hidden" name="lineNumber" value="<?= $index ?>">
                                        <input type="hidden" name="line" value="<?= urlencode($linha) ?>">
                                        <button type="submit" class="edit-btn">Editar</button>
                                    </form>
                                    <form action="excluir.php" method="POST" style="display:inline"
                                          onsubmit="return confirm('Tem certeza que deseja excluir esta linha?');">
                                        <input type="hidden" name="lineNumber" value="<?= $index ?>">
                                        <button type="submit" class="delete-btn">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="empty-state">O arquivo ainda não existe.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
