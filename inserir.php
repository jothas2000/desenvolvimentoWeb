<?php
require_once 'includes/auth.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Nova Linha</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="form-container">
        <h1>Inserir Nova Linha</h1>
        <form action="adicionar.php" method="POST">
            <div class="form-group">
                <label for="newLine">Nova Linha</label>
                <input type="text" id="newLine" name="newLine" required autofocus>
            </div>
            <div class="form-group">
                <button type="submit">Adicionar</button>
            </div>
        </form>
        <a href="telaInicial.php" class="back-link">← Voltar</a>
    </div>
</body>
</html>
