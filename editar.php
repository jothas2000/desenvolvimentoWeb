<?php
require_once 'includes/auth.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Linha</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="form-container">
        <h1>Editar Linha</h1>
        <form action="salvar.php" method="POST">
            <div class="form-group">
                <label for="line">Conteúdo da Linha</label>
                <input type="text" id="line" name="line"
                       value="<?= htmlspecialchars($_GET['line'] ?? '') ?>" required autofocus>
            </div>
            <input type="hidden" name="lineNumber" value="<?= (int) ($_GET['lineNumber'] ?? 0) ?>">
            <div class="form-group">
                <button type="submit">Salvar</button>
            </div>
        </form>
        <a href="telaInicial.php" class="back-link">← Voltar</a>
    </div>
</body>
</html>
