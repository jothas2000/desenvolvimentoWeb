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
            gap: 10px;
        }

        .edit-btn,
        .delete-btn {
            padding: 6px 12px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #4CAF50;
        }

        .edit-btn:hover {
            background-color: #45a049;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .delete-btn:hover {
            background-color: #e53935;
        }

        .add-btn {
            padding: 10px 20px;
            background-color: #2196F3;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 15px;
        }

        .add-btn:hover {
            background-color: #1E88E5;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Conteúdo do Arquivo</h1>
        <a href="inserir.php" class="add-btn">Adicionar Nova Linha</a>
        <table>
            <tr>
                <th>Índice</th> <!-- Coluna para o índice -->
                <th>Linha</th>
                <th>Ação</th>
            </tr>
            <?php
            $filename = "arquivos/db.txt";  // Nome do arquivo a ser lido
            
            // Verifica se o arquivo existe
            if (file_exists($filename)) {
                $file = fopen($filename, "r") or die("Não foi possível abrir o arquivo!");

                $lineNumber = 0;  // Contador de linha
            
                // Lê e exibe cada linha com botões de edição e exclusão
                while (!feof($file)) {
                    $linha = fgets($file);  // Lê uma linha do arquivo
                    if (trim($linha) != "") { // Ignora linhas vazias
                        echo "<tr>";
                        echo "<td>" . ($lineNumber + 1) . "</td>"; // Exibe o índice (linha + 1 para começar do 1)
                        echo "<td>" . htmlspecialchars($linha) . "</td>";
                        echo "<td class='action-buttons'>
                            <form action='editar.php' method='GET'>
                                <input type='hidden' name='lineNumber' value='" . $lineNumber . "'>
                                <input type='hidden' name='line' value='" . urlencode($linha) . "'>
                                <button type='submit' class='edit-btn'>Editar</button>
                            </form>
                            <form action='excluir.php' method='POST' onsubmit='return confirm(\"Você tem certeza que deseja excluir esta linha?\");'>
                                <input type='hidden' name='lineNumber' value='" . $lineNumber . "'>
                                <button type='submit' class='delete-btn'>Excluir</button>
                            </form>
                          </td>";
                        echo "</tr>";
                    }
                    $lineNumber++;
                }

                fclose(stream: $file);  // Fecha o arquivo
            } else {
                echo "<tr><td colspan='3'>O arquivo não existe.</td></tr>"; // Atualizado para corresponder ao número de colunas
            }
            ?>
        </table>
    </div>

</body>

</html>
