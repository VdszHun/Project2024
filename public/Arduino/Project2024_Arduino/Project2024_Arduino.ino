/*
Szükséges board, 2024. 01. 28-tól  viszonyítva:

Boardnév: esp8266
Verzió: 3.1.2
Boardlink, csatold az Arduino IDE 2.2.1 Preferences-en belül az additional boards Manager URLs-be:
http://arduino.esp8266.com/stable/package_esp8266com_index.json

A link csatolása és elfogadása után letölthetővé válik a board a Boards Managerben.

Szükséges könyvtárak, 2024. 01. 28-tól viszonyítva:

Könyvtárnév: Adafruit Unified Sensor
Verzió: 1.1.14

Könyvtárnév: DHT sensor library
Verzió: 1.4.6

-Vadász Dávid
*/

#include "DHT.h"
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

#define DHTPIN 5
#define DHTTYPE DHT11
#define ssid "Cisco3"
#define password "Eotvos2023"

DHT dht(DHTPIN,DHTTYPE);
IPAddress subnet(255,255,0,0);
IPAddress gateway(192,168,1,95);
IPAddress local_IP(192,168,12,2);
IPAddress dns1(8,8,8,8);
IPAddress dns2(192,168,100,150);
HTTPClient httpClient;
WiFiClient client;

const int AOUTpin = A0;
const int LEDpin = 3;
int levegominosegErtek;


void setup()
{
  pinMode(LEDpin, OUTPUT);
  Serial.begin(9600);
  dht.begin();

  if(WiFi.config(local_IP,gateway,subnet,dns1,dns2)){
    Serial.println("Statikus IP konfigurálva");
  }else{
    Serial.println("Statikus IP konfigurálása sikertelen!");
  }

  WiFi.begin(ssid,password);
  Serial.print("Csatlakozás...");
  while(WiFi.status() != WL_CONNECTED){
    Serial.print(".");
    delay(500);
  }

  Serial.println("");
  Serial.println("WiFi kapcsolódás sikeres!");
  Serial.println(WiFi.localIP());
 }

void loop()
{
  float paratartalom= dht.readHumidity();
  float homersekletCelsius= dht.readTemperature();
  float homersekletFahrenheit= dht.readTemperature(true);

  if (isnan(paratartalom) || isnan(homersekletCelsius) || isnan(homersekletFahrenheit)){
    Serial.println("Sikertelen olvasás, ellenőrizd a kábeleket!");
  }else{
    Serial.print("Páratartalom: ");
    Serial.print(paratartalom);
    Serial.print("%");
    Serial.print("  ||  ");
    Serial.print("Hőmérséklet: ");
    Serial.print(homersekletCelsius);
    Serial.print(" °C");
    Serial.print(homersekletFahrenheit);
    Serial.println(" °F");  
    }
  
  levegominosegErtek = analogRead(0);
  Serial.println(levegominosegErtek, DEC);

  homersekletKuldes(paratartalom, homersekletCelsius);
  legminosegKuldes(levegominosegErtek);

  digitalWrite(LEDpin, HIGH);

  delay(10000); 

  digitalWrite(LEDpin, LOW);
}

void legminosegKuldes(int legminoseg){
  const char *URL = "http://192.168.21.74/Project2024/public/api/legminoseg/beszuras";
  String data = "legminoseg="+String(legminoseg);
  httpClient.begin(client,URL);
  httpClient.addHeader("Content-Type","application/x-www-form-urlencoded");
  httpClient.POST(data);
  String content = httpClient.getString();
  httpClient.end();
  Serial.print("RESPONSE: ");
  Serial.println(content);
}

void homersekletKuldes(float hofok, float para){
  const char *URL = "http://192.168.21.74/Project2024/public/api/homerseklet/beszuras";
  String data = "homerseklet="+String(hofok)+"&paratartalom="+String(para);
  httpClient.begin(client,URL);
  httpClient.addHeader("Content-Type","application/x-www-form-urlencoded");
  httpClient.POST(data);
  String content = httpClient.getString();
  httpClient.end();
  Serial.print("RESPONSE: ");
  Serial.println(content);
}

