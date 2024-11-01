<h1 align="center">
    <img alt="Logo_JD" title="Logo_JD" src=".gitignore/jd_banner" width="700"/>
</h1>


# Projeto JDUBER 

## Introdução



O projeto foi desenvolvido para resolver a necessidade de localização eficiente de plataformas móveis na fábrica da John Deere. Esse problema afeta a operação industrial ao dificultar a logística e movimentação de equipamentos, levando a atrasos e ineficiências.

O objetivo deste projeto é desenvolver uma solução integrada baseada na Internet das Coisas (IoT) para otimizar o rastreamento e o gerenciamento logístico dos carrinhos plataforma na fábrica da John Deere. Utilizando o módulo ESP32, o sistema permitirá o monitoramento em tempo real dos carrinhos, enviando dados de localização para um servidor Django. A partir dessa infraestrutura, os operadores poderão visualizar as posições dos carrinhos e gerenciar solicitações de movimentação por meio de uma interface gráfica web, proporcionando maior agilidade e eficiência nas operações logísticas internas.
  

## Desenvolvimento

Este projeto é composto por dois sistemas principais que trabalham de forma integrada: um sistema de hardware ESP32 para monitoramento dos carrinhos e um sistema de aplicação web para que os operadores possam interagir e visualizar as informações coletadas.

### Sistema de Monitoramento com ESP32

#### Arquitetura do Sistema

O sistema de monitoramento é responsável pela coleta de dados sobre a localização dos carrinhos na fábrica. Ele é composto por:


1. **ESP32**: Um microcontrolador com conexão WiFi que identifica e envia a posição dos carrinhos utilizando triangulação de sinais WiFi.
2. **Servidor Django**: Um servidor backend que recebe os dados de localização enviados pelo ESP32. Ele processa e armazena essas informações, tornando-as disponíveis para a aplicação web.

#### Funcionamento

<h1 align="center">
    <img alt="Mapa" title="Mapa" src="assets/mapa.png" width="700"/>
</h1>



#### Tecnologias Utilizadas

- **Arduino IDE**: Utilizado para programar o ESP32 e garantir que ele se comunique com o servidor.
- **Django (Python Framework)**: Gerencia o servidor backend, processando e armazenando os dados de localização recebidos do ESP32.
- **Python/C++**: A lógica de comunicação entre o ESP32 e o servidor é escrita em Python e C++, possibilitando o envio dos dados de localização via WiFi.

### Sistema de Aplicação Web para Operadores

#### Arquitetura do Sistema

A aplicação web é a interface que os operadores utilizam para visualizar e interagir com os dados de monitoramento dos carrinhos. Ela é composta por:

1. **Interface Gráfica do Usuário (GUI)**: Permite que os operadores façam solicitações de movimentação dos carrinhos ou verifiquem informações em tempo real sobre o status dos mesmos. 
2. **Lógica de Ações e Tabela de Dados**: Este sistema processa as interações dos operadores e exibe as informações detalhadas sobre o status dos carrinhos, incluindo o tipo de item transportado, a área onde o carrinho está localizado, e seu status atual (por exemplo, "PENDENTE", "CONCLUÍDO", ou "EM ANDAMENTO").

#### Funcionamento



Logo a baixo, segue um vídeo de apresentação do site.

<h1 align="center">
    <a href="https://youtu.be/V48dNViUV0M?si=h_TEO61AKnp199Pr">
        <img src="https://img.youtube.com/vi/V48dNViUV0M/maxresdefault.jpg" alt="Assista ao vídeo" width="500" height="auto">
    </a>
</h1>

- **Interface Gráfica (GUI)**: Sempre que um operador precisar gerenciar ou visualizar os carrinhos, ele abrirá o site.

  - **Botão "Solicitar"**: Este botão é usado para registrar solicitações de movimentação. Quando o operador clica no botão, o sistema responde registrando a solicitação.
  
  - **Botão "Manuseio"**: Ao clicar neste botão, uma tabela é exibida com informações detalhadas dos carrinhos, permitindo ao operador visualizar a situação e o progresso de cada carrinho.

- **Exibição da Tabela**: A tabela exibe informações como o tipo de item que o carrinho transporta, a área em que ele se encontra e o status de sua operação. Isso facilita para o operador acompanhar o andamento das movimentações e tomar decisões com base nas informações exibidas.

#### Tecnologias Envolvidas

1. **HTML**: Linguagem de marcação usada para estruturar o conteúdo de páginas web, ela define a hierarquia e o layout de uma página (títulos, parágrafos, imagens, links, etc.).
2. **CSS**: Linguagem de estilo usada para controlar a aparência de páginas web, ela é responsável por estiliza o HTML, controlando layout, cores, fontes, espaçamentos, e outros aspectos visuais.
3. **PHP**: Linguagem de programação do lado do servidor usada para criar conteúdo dinâmico em páginas web, gera HTML dinamicamente, conecta-se a bancos de dados, e manipula entradas de usuários.

---

Dessa forma, o sistema garante o monitoramento eficiente dos carrinhos na fábrica, integrando o hardware de coleta de dados (ESP32) com uma interface gráfica amigável para os operadores, permitindo que eles visualizem e gerenciem a logística de maneira eficaz.


## Resultados

A aplicação entrega os seguintes resultados:

- A localização em tempo real do carrinho plataforma é mostrada em um mapa na interface web.
- Os dados de localização são atualizados a cada X segundos, permitindo um monitoramento preciso.

## Testes de Desempenho

### Definição da Ferramenta de Teste

Para avaliar o desempenho do sistema de localização WiFi no ESP32, foram escolhidos dois testes: **Precisão de Localização** e **Tempo de Resposta**.

1. **Teste de Precisão de Localização**: Esse teste captura os valores de RSSI de três pontos de acesso WiFi conhecidos e utiliza trilateração para estimar a posição de um dispositivo alvo. O objetivo é calcular o erro de posicionamento em relação à posição real, medindo a precisão da localização.

2. **Teste de Tempo de Resposta**: Esse teste mede o intervalo de tempo entre as leituras de RSSI do ESP32, registrando a velocidade e consistência de resposta para cenários de rastreamento em tempo real. Os tempos de resposta entre cada leitura são calculados e exibidos em milissegundos.

## Metodologia

### Teste 1: Precisão de Localização

Este teste visa verificar o quão próximo o ESP32 consegue identificar a posição de um ativo (um dispositivo com WiFi) usando triangulação. 

1. **Ambiente Controlado**: Escolha uma área onde seja possível colocar o ESP32 e os pontos de acesso WiFi em locais fixos e bem definidos. Anote as posições exatas (em coordenadas x, y, e possivelmente z).

2. **Configuração dos Pontos de Acesso (APs)**: Coloque pelo menos três APs em posições fixas e configure o ESP32 para capturar os sinais RSSI (Received Signal Strength Indicator) de cada um.

3. **Cálculo da Triangulação**: Utilize as leituras RSSI para aplicar uma fórmula de triangulação (temos opções como trilateração usando RSSI, para aproximar a localização). O código será implementado para que o ESP32 faça as medições e devolva as coordenadas estimadas.

4. **Medições e Comparações**: Coloque o ativo em diferentes posições conhecidas e colete os valores de localização estimada para comparar com as coordenadas reais.

5. **Análise de Precisão**: Calcule o erro médio entre as posições reais e as posições estimadas (Erro de Posicionamento).

### Teste 2: Tempo de Resposta

Este teste verifica quanto tempo o ESP32 leva para capturar uma mudança de sinal e retornar os dados de localização.

1. **Configuração do Tempo de Amostragem**: Configure o ESP32 para amostrar as leituras de sinal a intervalos regulares (ex.: a cada 100 ms ou 500 ms).

2. **Implementação de Teste de Latência**: Configure o código para registrar o timestamp (em milissegundos) a cada captura de sinal. O código será ajustado para calcular o tempo entre as leituras e gerar uma média do tempo de resposta.

3. **Coleta de Dados**: Execute o teste em uma área controlada e colete dados durante um período determinado, registrando o tempo entre cada leitura.

4. **Análise de Resultados**: Calcule o tempo médio de resposta e a variabilidade (desvio padrão) para determinar a consistência.
   

### Evidências de Testes

#### Teste de Precisão de Localização
Abaixo estão os valores de RSSI e as posições estimadas para diferentes localizações de teste do dispositivo alvo.

![image](https://github.com/user-attachments/assets/4c576667-4821-4ed9-9337-3c6714d1574b)

### Discussão dos Resultados

#### Teste de Precisão de Localização
Os resultados indicam que o erro de posicionamento médio é de aproximadamente 2.0 metros. A precisão variou dependendo da intensidade do sinal e da proximidade dos pontos de acesso, com maior precisão quando o dispositivo está mais próximo de um AP.

#### Teste de Tempo de Resposta
O tempo de resposta médio foi de 1000 ms, mostrando que o ESP32 é capaz de capturar as variações de sinal em intervalos consistentes. Essa velocidade é adequada para aplicações de rastreamento em tempo real, mas pode ser otimizada com melhorias de firmware e intervalos de amostragem mais curtos.


### Soluções Futuras

Para aprimorar os resultados dos testes, algumas melhorias podem ser implementadas no futuro:

- **Precisão de Localização**: Implementar filtros de sinal (ex.: filtro de Kalman) para reduzir a variação do RSSI e obter uma estimativa de posição mais estável.
- **Tempo de Resposta**: Reduzir o intervalo de amostragem para aumentar a taxa de captura de sinal, possibilitando um rastreamento ainda mais ágil.
