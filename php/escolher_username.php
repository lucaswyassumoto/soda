<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/escolher_username.css" type="text/css">
    <link rel="shortcut icon" href="../img/faviconwhite.ico" type="image/x-icon">
    <title>Soda - Cadastro</title>
</head>
<body>

    <div class="conteiner">
        <form id="formUsername" action="../php/salvar_username.php" method="post">
            
            <h1>Crie um nome de usuário</h1>

            <input type="text" name="username" id="username" required>

            <button type="submit" class="create">Começar</button>
        </form>
    </div>
    
</body>
</html>