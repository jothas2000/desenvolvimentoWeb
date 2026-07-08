<?php
session_start();

$valid_username = 'admin';
$valid_password = 'admin';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        session_regenerate_id(true);
        $_SESSION['logado'] = true;
        header('Location: telaInicial.php');
        exit;
    }

    $_SESSION['error'] = 'Usuário ou senha incorretos!';
    header('Location: index.php');
    exit;
}

header('Location: index.php');
exit;
