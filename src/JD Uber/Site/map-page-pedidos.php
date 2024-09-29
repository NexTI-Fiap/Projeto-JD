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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Página com mapa das posições dos carrinhos e botão de concluir pedido</title>
</head>

<header>
    <?php include 'menu-logado.php'; ?>
</header>

<body>

    <div id="mapa">
        <div id="carrinho1"></div>
        <div id="carrinho2"></div>
    </div>
    
    <div class="inputs-content">
    <div id="inputs1">
        <input type="number" id="inputX1" placeholder="Posição X carrinho 1">
        <input type="number" id="inputY1" placeholder="Posição Y carrinho 1">
    </div>
    <div id="inputs2">
        <input type="number" id="inputX2" placeholder="Posição X carrinho 2">
        <input type="number" id="inputY2" placeholder="Posição Y carrinho 2">
    </div>

    <div class="btn-concluir-pedido">
        <button><p>Concluir pedido</p></button>
    </div>
    
</div>

<script>
    const carrinho1 = document.getElementById('carrinho1');
    const inputX1 = document.getElementById('inputX1');
    const inputY1 = document.getElementById('inputY1');
    const carrinho2 = document.getElementById('carrinho2');
    const inputX2 = document.getElementById('inputX2');
    const inputY2 = document.getElementById('inputY2');
    
    const mapa = document.getElementById('mapa');
    const gridSize = 20;  // Tamanho de cada célula da matriz

    // Criação de uma matriz representando o mapa
    const rows = Math.floor(mapa.clientHeight / gridSize);
    const cols = Math.floor(mapa.clientWidth / gridSize);
    let grid = Array.from({ length: rows }, () => Array(cols).fill(0));

    function atualizarPosicao1() {
        const x1 = parseInt(inputX1.value, 10);
        const y1 = parseInt(inputY1.value, 10);
        const alturaMapa = mapa.clientHeight;

        if (!isNaN(x1) && !isNaN(y1)) {
            carrinho1.style.left = `${x1}px`;
            carrinho1.style.top = `${alturaMapa - y1}px`;
            calcularCaminho(); // Chama a função para calcular o caminho
        }
    }

    function atualizarPosicao2() {
        const x2 = parseInt(inputX2.value, 10);
        const y2 = parseInt(inputY2.value, 10);
        const alturaMapa = mapa.clientHeight;

        if (!isNaN(x2) && !isNaN(y2)) {
            carrinho2.style.left = `${x2}px`;
            carrinho2.style.top = `${alturaMapa - y2}px`;
            calcularCaminho(); // Chama a função para calcular o caminho
        }
    }

    inputX1.addEventListener('input', atualizarPosicao1);
    inputY1.addEventListener('input', atualizarPosicao1);
    inputX2.addEventListener('input', atualizarPosicao2);
    inputY2.addEventListener('input', atualizarPosicao2);

    // Função para calcular o caminho mais curto (usando BFS)
    function calcularCaminho() {
        // Posições dos carrinhos no grid
        const startX = Math.floor(parseInt(inputX1.value, 10) / gridSize) +1;
        const startY = Math.floor(parseInt(inputY1.value, 10) / gridSize) -2;
        const endX = Math.floor(parseInt(inputX2.value, 10) / gridSize) +1;
        const endY = Math.floor(parseInt(inputY2.value, 10) / gridSize) -2;

        // Função BFS para encontrar o caminho mais curto
        const bfs = (start, goal) => {
            const queue = [[start]];
            const visited = new Set();
            visited.add(`${start[0]},${start[1]}`);

            const directions = [
                [1, 0], [-1, 0], [0, 1], [0, -1]  // Direções possíveis (direita, esquerda, cima, baixo)
            ];

            while (queue.length > 0) {
                const path = queue.shift();
                const [x, y] = path[path.length - 1];

                if (x === goal[0] && y === goal[1]) {
                    return path;  // Caminho encontrado
                }

                for (let [dx, dy] of directions) {
                    const nx = x + dx;
                    const ny = y + dy;

                    if (nx >= 0 && ny >= 0 && nx < cols && ny < rows && !visited.has(`${nx},${ny}`)) {
                        queue.push([...path, [nx, ny]]);
                        visited.add(`${nx},${ny}`);
                    }
                }
            }
            return null;  // Nenhum caminho encontrado
        };

        const caminho = bfs([startX, startY], [endX, endY]);

        // Exibe o caminho (opcionalmente, podemos desenhar ou destacar o caminho no grid)
        if (caminho) {
            console.log("Caminho encontrado:", caminho);
            desenharCaminho(caminho);  // Chama a função para desenhar o caminho
        } else {
            console.log("Nenhum caminho encontrado.");
        }
    }

    // Função para desenhar o caminho no mapa (opcional)
    function desenharCaminho(caminho) {
    // Remove caminhos antigos
        const linhasExistentes = document.querySelectorAll('.linha-caminho');
        linhasExistentes.forEach(linha => linha.remove());

        caminho.forEach(([x, y], index) => {
            if (index > 0) {
                const linha = document.createElement('div');
                linha.classList.add('linha-caminho');
                linha.style.position = 'absolute';

                // Calcula o centro da célula
                const centroX = x * gridSize + gridSize / 2;
                const centroY = (rows - y - 1) * gridSize + gridSize / 2;

                // Ajusta a posição e o tamanho da linha para centralizar na imagem do carrinho
                linha.style.left = `${centroX - gridSize / 4}px`;
                linha.style.top = `${centroY - gridSize / 4}px`;
                linha.style.width = `${gridSize / 2}px`;
                linha.style.height = `${gridSize / 2}px`;

                // Adiciona a linha ao mapa
                mapa.appendChild(linha);
                linha.style.backgroundColor = 'blue'; // Restaura a cor do caminho
        }
        });
    }
</script>

</body>
</html>
