<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editedLine = $_POST['line'] . ' ---END---';  // Adiciona o delimitador ao final da linha
    $lineNumber = (int) $_POST['lineNumber'];
    $filename = "arquivos/db.txt";
    $tempFile = "arquivos/temp.txt";  // Arquivo temporário

    if (file_exists($filename)) {
        $file = fopen($filename, "r");
        $newFile = fopen($tempFile, "w");

        $currentLineIndex = 0;

        // Lê o arquivo original e escreve no temporário, substituindo apenas a linha correta
        while (($linha = fgets($file)) !== false) {
            $lineContent = str_replace(' ---END---', '', $linha); // Remove o delimitador ao ler
            if ($currentLineIndex === $lineNumber) {
                fwrite($newFile, $editedLine . PHP_EOL); // Escreve a linha editada com o delimitador
            } else {
                fwrite($newFile, $lineContent . ' ---END---' . PHP_EOL); // Reescreve a linha com o delimitador
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
    } else {
        echo "Arquivo não encontrado!";
    }
}
