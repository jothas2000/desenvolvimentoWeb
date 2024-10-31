<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Diretório onde está o arquivo principal
    $filename = "arquivos/db.txt";

    // Verifica se o arquivo foi enviado
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        // Lê o conteúdo do arquivo enviado
        $uploadedFileContent = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);

        // Abre o arquivo principal para adicionar o conteúdo
        file_put_contents($filename, trim($uploadedFileContent) . " ---END---" . PHP_EOL, FILE_APPEND | LOCK_EX);

        // Redireciona de volta para a página principal
        header("Location: telainicial.php");
        exit();
    } else {
        echo "Erro no upload do arquivo.";
    }
}
?>
