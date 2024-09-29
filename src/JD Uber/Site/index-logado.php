<?php
    session_start();
    if((!isset($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header(Location: login-jhondeere.php);
    }
    $logado = $_SESSION['email'];


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Index logado</title>
</head>

<header>
    <?php include 'menu-logado.php'; ?>
</header>

<body>

<div class="index-logado">

    <div class="index-logado-imagem-fundo-content">
        <div class="index-logado-imagem-fundo">
            <img src="imagens/jhondeere-icon.png" alt="" width="250px">
        </div>
    </div>

    <div class="index-logado-mensage-content">
        <div class="index-logado-mensage">
            <p>Manufacturing Monitoring System</p>
        </div>
    </div>

</div>

</body>

</html>