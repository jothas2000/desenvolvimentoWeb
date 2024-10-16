<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leitura de Arquivo com Edição</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        .action-buttons {
            display: flex;
            /* Alinha os botões lado a lado */
            gap: 10px;
            /* Espaçamento entre os botões */
        }

        .edit-btn {
            padding: 6px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Conteúdo do Arquivo</h1>
        <table>
            <tr>
                <th>Linha</th>
                <th>Ação</th>
            </tr>
            <?php
            $filename = "arquivos/db.txt";  // Nome do arquivo a ser lido
            
            // Verifica se o arquivo existe
            if (file_exists($filename)) {
                // Abre o arquivo para leitura
                $file = fopen($filename, "r") or die("Não foi possível abrir o arquivo!");

                // Contador para as linhas (pode ser usado como ID da linha)
                $lineNumber = 0;

                // Lê e exibe cada linha com um botão de edição
                while (!feof($file)) {
                    $linha = fgets($file);  // Lê uma linha do arquivo
                    if (trim($linha) != "") { // Ignora linhas vazias
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($linha) . "</td>";
                        echo "<td class='action-buttons'>
                            <form action='editar.php' method='GET'>
                                <input type='hidden' name='line' value='" . urlencode($linha) . "'>
                                <button type='submit' class='edit-btn'>Editar</button>
                            </form>
                            <form action='excluir.php' method='GET'>
                                <input type='hidden' name='line' value='" . urlencode($linha) . "'>
                                <button type='submit' class='edit-btn'>Excluir</button>
                            </form>
                          </td>";
                        echo "</tr>";
                    }
                    $lineNumber++;
                }

                // Fecha o arquivo
                fclose($file);
            } else {
                echo "<tr><td colspan='2'>O arquivo não existe.</td></tr>";
            }
            ?>
        </table>
    </div>

</body>

</html>