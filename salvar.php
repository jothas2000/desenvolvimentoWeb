<?php
require_once 'includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $editedLine = str_replace(["\r", "\n"], '', trim($_POST['line'] ?? ''));
    $lineNumber = (int) ($_POST['lineNumber'] ?? 0);

    $filename = 'data/db.txt';

    if (file_exists($filename)) {
        $lines = file($filename, FILE_IGNORE_NEW_LINES);

        if (isset($lines[$lineNumber])) {
            $lines[$lineNumber] = $editedLine;
            file_put_contents($filename, implode(PHP_EOL, $lines) . PHP_EOL, LOCK_EX);
        }
    }

    header('Location: telaInicial.php');
    exit;
}

header('Location: telaInicial.php');
exit;
