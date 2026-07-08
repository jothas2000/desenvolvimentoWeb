<?php
require_once 'includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newLine = str_replace(["\r", "\n"], '', trim($_POST['newLine'] ?? ''));

    if ($newLine !== '') {
        $filename = 'data/db.txt';
        file_put_contents($filename, $newLine . PHP_EOL, FILE_APPEND | LOCK_EX);
    }

    header('Location: telaInicial.php');
    exit;
}

header('Location: telaInicial.php');
exit;
