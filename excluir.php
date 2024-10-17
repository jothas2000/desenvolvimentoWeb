<?php
session_start();

if (isset($_POST['lineNumber'])) {
    $lineToDeleteIndex = (int) $_POST['lineNumber'];  // Índice da linha a ser excluída

    $filename = "arquivos/db.txt";
    $tempFile = "temp.txt";

    if (file_exists($filename)) {
        $file = fopen($filename, "r");
        $newFile = fopen($tempFile, "w");

        $currentLineIndex = 0;

        // Lê o arquivo original e escreve no temporário, exceto a linha a ser excluída
        while (!feof($file)) {
            $linha = fgets($file);
            if ($currentLineIndex !== $lineToDeleteIndex) {
                fwrite($newFile, $linha);
            }
            $currentLineIndex++;
        }

        fclose($file);
        fclose($newFile);

        // Substitui o arquivo original pelo arquivo temporário
        rename($tempFile, $filename);

        // Redireciona de volta para a tela de leitura de arquivo
        header("Location: telaInicial.php");
        exit();
    } else {
        echo "Arquivo não encontrado!";
    }
} else {
    echo "Nenhuma linha foi selecionada para exclusão.";
}
