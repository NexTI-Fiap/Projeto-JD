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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Tabela-pedidos</title>
</head>

<header>
    <?php include 'menu-logado.php'; ?>
</header>

<body>
    <div class="tabela-pedidos">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Status carrinho</th>
                    <th>Status pedido</th>
                    <th>Posição</th>
                    <th>Aceitar</th>
                    <th>Concluir<br>pedido</th>
                </tr>
            </thead>

            <tbody>

                <!-- Pedaço que deve ser colocado para exibido a linha de determinado carrinho -->
                <tr>
                    <td>01</td>
                    <td>Vazio</td>
                    <td>Solicitado</td>
                    <td><a href="map-page-pedidos.php" class="action-link"><span class="material-symbols-outlined">map</span></a></td>
                    <td><button>Aceitar</button></td>
                    <td id="concluir-pedido"><button><span class="material-symbols-outlined">check_box</span></button></td>
                </tr>
                <!-- FIM Pedaço que deve ser colocado para exibido a linha de determinado carrinho -->

                <tr>
                    <td>02</td>
                    <td>Vazio</td>
                    <td>Pedido em<br>andamento</td>
                    <td><a href="map-page-pedidos.php" class="action-link"><span class="material-symbols-outlined">map</span></a></td>
                    <td><button>Aceitar</button></td>
                    <td id="concluir-pedido"><button><span class="material-symbols-outlined">check_box</span></button></td>
                </tr>
                <tr>
                    <td>03</td>
                    <td>Vazio</td>
                    <td>Solicitado</td>
                    <td><a href="map-page-pedidos.php" class="action-link"><span class="material-symbols-outlined">map</span></a></td>
                    <td><button>Aceitar</button></td>
                    <td id="concluir-pedido"><button><span class="material-symbols-outlined">check_box</span></button></td>
                </tr>
            </tbody>
    </div>
    
</body>

</html>