<?php
session_start();

if (isset($_GET['line'])) {
    $lineToDelete = $_GET['line'];

    $filename = "arquivos/db.txt";
    $tempFile = "temp.txt";

    if (file_exists($filename)) {
        $file = fopen($filename, "r");
        $newFile = fopen($tempFile, "w");

        // Lê o arquivo original e escreve no temporário, exceto a linha a ser excluída
        while (!feof($file)) {
            $linha = fgets($file);
            if (trim($linha) != trim($lineToDelete)) {
                fwrite($newFile, $linha);
            }
        }

        fclose($file);
        fclose($newFile);

        // Substitui o arquivo original pelo arquivo temporário
        rename($tempFile, $filename);

        // Redireciona de volta para a tela de leitura de arquivo
        header("Location: telaLeitura.php");
        exit();
    } else {
        echo "Arquivo não encontrado!";
    }
} else {
    echo "Nenhuma linha foi selecionada para exclusão.";
}
?>