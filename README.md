# Introdução

O projeto foi desenvolvido para resolver a necessidade de localização eficiente de plataformas móveis na fábrica da John Deere. Esse problema afeta a operação industrial ao dificultar a logística e movimentação de equipamentos, levando a atrasos e ineficiências.

O objetivo deste projeto é desenvolver uma solução integrada baseada na Internet das Coisas (IoT) para otimizar o rastreamento e o gerenciamento logístico dos carrinhos plataforma na fábrica da John Deere. Utilizando o módulo ESP32, o sistema permitirá o monitoramento em tempo real dos carrinhos, enviando dados de localização para um servidor Django. A partir dessa infraestrutura, os operadores poderão visualizar as posições dos carrinhos e gerenciar solicitações de movimentação por meio de uma interface gráfica web, proporcionando maior agilidade e eficiência nas operações logísticas internas



## Desenvolvimento

### Arquitetura do Sistema

O sistema é composto por:
1. **ESP32**: Conectado ao WiFi, responsável por identificar e enviar a posição dos carrinhos usando triangulação.
2. **Servidor Django**: Recebe e armazena os dados dos ESP32, processa a localização e disponibiliza para a interface web.
3. **Interface Gráfica Web**: Desenvolvida em HTML/CSS, permite que os operadores visualizem a localização dos carrinhos e gerenciem solicitações.

### Tecnologias Utilizadas
- **Arduino IDE**: Para programar o ESP32.
- **Django**: Para gerenciar o servidor e o backend da aplicação.
- **Python/C++**: Usado para a lógica de comunicação do ESP32 e servidor.
- **HTML/CSS**: Interface gráfica amigável para os operadores.


## Resultados

A aplicação entrega os seguintes resultados:

- A localização em tempo real do carrinho plataforma é mostrada em um mapa na interface web.
- Os dados de localização são atualizados a cada X segundos, permitindo um monitoramento preciso.

![Exemplo de Mapa](assets/map-example.png)

O sistema também gera logs de movimentação do carrinho, permitindo a auditoria das rotas percorridas.

![Exemplo de Log](assets/log-example.png)
