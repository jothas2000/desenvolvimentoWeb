<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Linha</title>
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

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .form-group button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Editar Linha</h1>
        <form action="salvar.php" method="POST">
            <div class="form-group">
                <label for="line">Conteúdo da Linha:</label>
                <input type="text" id="line" name="line"
                    value="<?php echo htmlspecialchars(urldecode($_GET['line'])); ?>" required>
            </div>
            <!-- Passar a linha original via input hidden -->
            <input type="hidden" name="original_line" value="<?php echo htmlspecialchars(urldecode($_GET['line'])); ?>">
            <input type="hidden" name="lineNumber" value="<?php echo $_GET['lineNumber']; ?>">
            <!-- Passa o índice da linha -->
            <div class="form-group">
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>

</body>

</html>