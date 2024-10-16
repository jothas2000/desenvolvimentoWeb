<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editedLine = $_POST['line'];         // Linha editada
    $originalLine = $_POST['original_line'];  // Linha original

    $filename = "arquivos/db.txt";        // Nome do arquivo original
    $tempFile = "temp.txt";               // Arquivo temporário

    // Verifica se o arquivo original existe
    if (file_exists($filename)) {
        $file = fopen($filename, "r");
        $newFile = fopen($tempFile, "w");

        // Lê o arquivo linha por linha
        while (!feof($file)) {
            $linha = fgets($file);

            // Verifica se a linha atual é igual à linha original (antes da edição)
            if (trim($linha) == trim($originalLine)) {
                // Substitui pela linha editada
                fwrite($newFile, $editedLine . "\n");
            } else {
                // Mantém as outras linhas
                fwrite($newFile, $linha);
            }
        }

        fclose($file);
        fclose($newFile);

        // Substitui o arquivo original pelo arquivo temporário
        rename($tempFile, $filename);

        // Redireciona para a tela principal
        header("Location: telaInicial.php");
        exit();
    } else {
        echo "Arquivo não encontrado!";
    }
}
?>