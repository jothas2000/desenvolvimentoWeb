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

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            vertical-align: top; /* Alinha o conteúdo ao topo */
            width: 249px;

        }

        td {
            word-wrap: break-word;
            white-space: normal;
            max-width: 100%; /* Define a largura máxima para quebra de linha */
        }

        .action-buttons {
            display: flex;
            flex-direction: row; /* Empilha os botões verticalmente */
            gap: 5px;
            justify-content: space-evenly;
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

        .upload-form {
    display: flex;
    align-items: center;
    margin: 25px 0;
    padding: 15px;
    border-radius: 8px;
    background-color: #f8f8f8;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
    gap: 15px;
}

.upload-form label {
    font-weight: bold;
    color: #333;
    font-size: 16px;
}

#fileToUpload {
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 15px;
    background-color: #fff;
}

.upload-form button {
    padding: 10px 20px;
    background-color: #2196F3;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.1s ease-in-out;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
}

.upload-form button:hover {
    background-color: #1E88E5;
}

    </style>
</head>

<body>

    <div class="container">
        <h1>Conteúdo do Arquivo</h1>

        <!-- Formulário de Upload -->
        <form action="upload.php" method="POST" enctype="multipart/form-data" class="upload-form">
            <label for="fileToUpload">Adicionar Linha com Arquivo:</label>
            <input type="file" name="fileToUpload" id="fileToUpload" accept=".txt">
            <button type="submit">Upload</button>
        </form>

        <a href="inserir.php" class="add-btn">Adicionar Nova Linha</a>
        
        <table>
            <tr>
                <th>Índice</th>
                <th>Linha</th>
                <th>Ação</th>
            </tr>
            <?php
            $filename = "arquivos/db.txt";  // Nome do arquivo a ser lido
            
            // Verifica se o arquivo existe
            if (file_exists($filename)) {
                $fileContent = file_get_contents($filename);
                
                // Divide o conteúdo em linhas usando o delimitador
                $entries = explode(" ---END---", $fileContent);
                $lineNumber = 0;

                foreach ($entries as $entry) {
                    $linha = trim($entry);
                    if (!empty($linha)) {
                        // Substitui <br> pelo equivalente HTML para exibição
                        $linhaFormatada = str_replace("<br>", "\n", htmlspecialchars($linha));
                        echo "<tr>";
                        echo "<td>" . ($lineNumber + 1) . "</td>"; // Exibe o índice
                        echo "<td>" . nl2br($linhaFormatada) . "</td>";
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
                        $lineNumber++;
                    }
                }
            } else {
                echo "<tr><td colspan='3'>O arquivo não existe.</td></tr>";
            }
            ?>
        </table>
    </div>

</body>

</html>
