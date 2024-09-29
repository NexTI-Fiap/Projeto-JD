#include <WiFi.h>
#include <HTTPClient.h>

// Dados do Roteador 1 (Celular 1)
const char* ssid_1 = "LEO._.2G";
const char* password_1 = "@leo197422";

// Dados do Roteador 2 (Celular 2)
const char* ssid_2 = "Hotspot2";
const char* password_2 = "mrs210101";

// Servidor
const char* serverName = "http://26.174.92.224:8000/api/update_position/";

// Identificação do ESP32
const int esp_id = 1; // Coloque um ID único para cada ESP32 (1 para o primeiro, 2 para o segundo)

// Trilateração (coordenadas dos roteadores fixos)
float x1 = 0.0, y_1 = 0.0;  // Posição do roteador 1
float x2 = 10.0, y_2 = 0.0; // Posição do roteador 2

void setup() {
  Serial.begin(115200);

  // Conectar ao roteador 1
  WiFi.begin(ssid_1, password_1);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.println("Tentando conectar ao roteador 1...");
  }
  Serial.println("Conectado ao roteador 1");

  // Obter RSSI do roteador 1
  int rssi1 = WiFi.RSSI();
  Serial.print("RSSI do roteador 1: ");
  Serial.println(rssi1);

  // Conectar ao roteador 2
  WiFi.begin(ssid_2, password_2);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.println("Tentando conectar ao roteador 2...");
  }
  Serial.println("Conectado ao roteador 2");

  // Obter RSSI do roteador 2
  int rssi2 = WiFi.RSSI();
  Serial.print("RSSI do roteador 2: ");
  Serial.println(rssi2);

  // Calcular a posição do ESP32 com trilateração
  float distancia1 = calcularDistancia(rssi1);
  float distancia2 = calcularDistancia(rssi2);
  float x, y;
  trilateracao(x1, y_1, distancia1, x2, y_2, distancia2, &x, &y);

  // Enviar posição ao servidor
  enviarDados(x, y);
}

void loop() {
  // Aqui você pode ajustar o tempo para coletar e enviar dados periodicamente
  delay(10000); // Enviar a cada 10 segundos (ajustável)
}

// Função para calcular distância a partir do RSSI
float calcularDistancia(int rssi) {
  // Fórmula simples para converter RSSI em distância aproximada
  return pow(10, ((-69 - rssi) / (10 * 2)));
}

// Função de trilateração básica para calcular a posição
void trilateracao(float x1, float y_1, float d1, float x2, float y_2, float d2, float *x, float *y) {
  *x = (d1 * x2 + d2 * x1) / (d1 + d2);
  *y = (d1 * y_2 + d2 * y_1) / (d1 + d2);
}

// Função para enviar os dados ao servidor
void enviarDados(float x, float y) {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(serverName);
    http.addHeader("Content-Type", "application/json");

    // Criar JSON com dados da posição
    String postData = "{\"id\": " + String(esp_id) + ", \"x\": " + String(x) + ", \"y\": " + String(y) + "}";
    
    int httpResponseCode = http.POST(postData);

    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.println("Resposta do servidor: " + response);
    } else {
      Serial.print("Erro ao enviar os dados ao servidor. Código: ");
      Serial.println(httpResponseCode);
    }

    http.end();
  } else {
    Serial.println("Erro de conexão Wi-Fi");
  }
}
