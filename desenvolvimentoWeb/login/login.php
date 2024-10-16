<?php
session_start(); // Inicia a sessão

$valid_username = "admin";
$valid_password = "admin";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        header("Location: telaInicial.php");
    } else {
        $_SESSION['error'] = 'Usuário ou senha incorretos!';
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit();
}
?>