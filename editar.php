<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Linha</title>
    <style>
    /* Estilos (os mesmos que você já tinha) */
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
        font-weight: bold; 
    }
    .form-group textarea { 
        width: 100%; 
        padding: 10px; 
        box-sizing: border-box; 
        resize: vertical; 
        min-height: 150px; 
        font-family: 'Arial', sans-serif; 
        font-size: 16px; 
        line-height: 1.5; 
        border: 1px solid #ccc; 
        border-radius: 4px; 
    }
    .form-group button { 
        padding: 10px 15px; 
        background-color: #4CAF50; 
        color: white; 
        border: none; 
        border-radius: 4px; 
        cursor: pointer; 
        font-size: 16px; 
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
                <textarea id="line" name="line" required><?php echo htmlspecialchars(str_replace(' ---END---', '', urldecode($_GET['line']))); ?></textarea>
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