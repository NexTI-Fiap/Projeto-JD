<?php
// Definir a URL base da API do servidor Django
$apiBaseUrl = "http://172.16.53.81"; // Substitua pelo IP ou domínio do servidor

// Função para obter a posição do carrinho (X e Y)
function getCartPosition() {
    global $apiBaseUrl;
    $endpoint = "get_cart_position/"; // Endpoint do Django para obter a posição do carrinho (X e Y)
    
    // Iniciar uma sessão cURL
    $ch = curl_init();
    
    // Definir a URL completa do endpoint
    curl_setopt($ch, CURLOPT_URL, $apiBaseUrl . $endpoint);
    
    // Definir que a resposta deve ser retornada como string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    // Executar a requisição
    $response = curl_exec($ch);
    
    // Verificar se houve erro na requisição
    if (curl_errno($ch)) {
        echo 'Erro ao conectar ao servidor: ' . curl_error($ch);
        return false;
    }
    
    // Fechar a sessão cURL
    curl_close($ch);
    
    // Retornar a resposta como array JSON
    return json_decode($response, true);
}

// Função para solicitar o carrinho
function requestCart() {
    global $apiBaseUrl;
    $endpoint = "request_cart/"; // Endpoint para solicitar o carrinho
    
    // Iniciar uma sessão cURL
    $ch = curl_init();
    
    // Definir a URL completa do endpoint
    curl_setopt($ch, CURLOPT_URL, $apiBaseUrl . $endpoint);
    
    // Definir o método de requisição como POST
    curl_setopt($ch, CURLOPT_POST, 1);
    
    // Enviar uma requisição POST vazia
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Executar a requisição
    $response = curl_exec($ch);
    
    // Verificar se houve erro na requisição
    if (curl_errno($ch)) {
        echo 'Erro ao conectar ao servidor: ' . curl_error($ch);
        return false;
    }
    
    // Fechar a sessão cURL
    curl_close($ch);
    
    // Retornar a resposta como array JSON
    return json_decode($response, true);
}

// Exibir a posição do carrinho
function displayCartPosition() {
    $positionData = getCartPosition();
    
    if ($positionData) {
        $x = $positionData['x'];
        $y = $positionData['y'];
        
        echo "Posição do Carrinho: X: $x, Y: $y";
    } else {
        echo "Não foi possível obter a posição do carrinho.";
    }
}

// Exemplo de uso das funções
if (isset($_POST['get_position'])) {
    displayCartPosition();
}

if (isset($_POST['request_cart'])) {
    $requestResponse = requestCart();
    if ($requestResponse) {
        echo "Carrinho solicitado com sucesso!";
    } else {
        echo "Erro ao solicitar o carrinho.";
    }
}
?>
