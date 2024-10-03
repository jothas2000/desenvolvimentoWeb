<?php
// Simulação de usuário e senha fixos para verificação
$valid_username = "admin";
$valid_password = "123456";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica se o usuário e senha são corretos
    if ($username === $valid_username && $password === $valid_password) {
        echo "<h2>Bem-vindo, $username!</h2>";
    } else {
        // Redireciona para o formulário de login com um parâmetro de erro
        header("Location: index.php?error=true");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
