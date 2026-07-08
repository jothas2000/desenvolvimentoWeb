<?php
require_once 'includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lineNumber'])) {
    $lineToDelete = (int) $_POST['lineNumber'];
    $filename = 'data/db.txt';

    if (file_exists($filename)) {
        $lines = file($filename, FILE_IGNORE_NEW_LINES);

        if (isset($lines[$lineToDelete])) {
            unset($lines[$lineToDelete]);
            $lines = array_values($lines);
            file_put_contents($filename, implode(PHP_EOL, $lines) . PHP_EOL, LOCK_EX);
        }
    }

    header('Location: telaInicial.php');
    exit;
}

header('Location: telaInicial.php');
exit;
