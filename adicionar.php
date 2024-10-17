<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newLine = $_POST['newLine'];

    // Verifica se a nova linha não está vazia
    if (!empty(trim($newLine))) {
        $filename = "arquivos/db.txt";  // Nome do arquivo

        // Abre o arquivo para adicionar a nova linha no final
        $file = fopen($filename, "a") or die("Não foi possível abrir o arquivo!");

        // Adiciona a nova linha com uma quebra de linha no final
        fwrite($file, $newLine . PHP_EOL);

        fclose($file);

        // Redireciona de volta para a tela de leitura de arquivo
        header("Location: telaInicial.php");
        exit();
    } else {
        echo "A linha não pode estar vazia!";
    }
}
