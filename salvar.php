<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editedLine = $_POST['line'];
    $lineNumber = (int) $_POST['lineNumber'];

    $filename = "arquivos/db.txt";
    $tempFile = "temp.txt";  // Arquivo temporário

    if (file_exists($filename)) {
        $file = fopen($filename, "r");
        $newFile = fopen($tempFile, "w");

        $currentLineIndex = 0;

        // Lê o arquivo original e escreve no temporário, substituindo apenas a linha correta
        while (!feof($file)) {
            $linha = fgets($file);
            if ($currentLineIndex === $lineNumber) {
                fwrite($newFile, $editedLine . PHP_EOL);
            } else {
                fwrite($newFile, $linha);
            }
            $currentLineIndex++;
        }

        fclose($file);
        fclose($newFile);

        // Substitui o arquivo original pelo arquivo temporário
        rename($tempFile, $filename);

        // Redireciona para a tela inicial
        header("Location: telaInicial.php");
        exit();
    }
}
