<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newLine = $_POST['newLine'];

    // Verifica se a nova linha não está vazia
    if (!empty(trim($newLine))) {
        $filename = "arquivos/db.txt";  // Nome do arquivo

        // Substitui quebras de linha por <br> para preservar quebras de linha ao exibir
        $newLine = str_replace("\n", "", $newLine);

        // Adiciona a nova linha com o delimitador e uma quebra de linha no final
        $contentToAdd = $newLine . " ---END---" . PHP_EOL;

        // Abre o arquivo para adicionar a nova linha no final
        $file = fopen($filename, "a") or die("Não foi possível abrir o arquivo!");
        fwrite($file, $contentToAdd); // Grava o conteúdo com o delimitador
        fclose($file);

        // Redireciona de volta para a tela de leitura de arquivo
        header("Location: telaInicial.php");
        exit();
    } else {
        echo "A linha não pode estar vazia!";
    }
}
?>
