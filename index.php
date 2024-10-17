<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Inicia a sessão para verificar a mensagem de erro
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Verificação de Usuário</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <!-- Verifica se existe uma mensagem de erro e exibe -->
            <?php if (isset($_SESSION['error'])): ?>
                <div class="error-message" style="color: red;">
                    <?= $_SESSION['error']; ?>
                </div>
                <?php unset($_SESSION['error']); // Limpa a mensagem de erro após exibir ?>
            <?php endif; ?>
            <div class="form-group">
                <button type="submit">Entrar</button>
            </div>
        </form>
    </div>
</body>

</html>