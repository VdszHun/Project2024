/*
Szükséges board, 2024. 03. 04-től  viszonyítva:

Boardnév: esp8266
Verzió: 3.1.2
Boardlink, csatold az Arduino IDE 2.3.2 Preferences-en belül az additional boards Manager URLs-be:
http://arduino.esp8266.com/stable/package_esp8266com_index.json

A link csatolása és elfogadása után letölthetővé válik a board a Boards Managerben.

Szükséges könyvtárak, 2024. 03. 04-től viszonyítva:

Könyvtárnév: Adafruit Unified Sensor
Verzió: 1.1.14

Könyvtárnév: DHT sensor library
Verzió: 1.4.6

-Vadász Dávid
*/

#include "DHT.h"
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

#define DHTPIN D5
#define DHTTYPE DHT11
#define ssid "Cisco4"
#define password "Eotvos2023"

DHT dht(DHTPIN,DHTTYPE);
/*IPAddress subnet(255,255,0,0);
IPAddress gateway(192,168,1,95);
IPAddress local_IP(192,168,12,2);
IPAddress dns1(8,8,8,8);
IPAddress dns2(192,168,100,150);
*/
HTTPClient httpClient;
WiFiClient client;

const int AOUTpin = A0;
const int AdatLEDpin = D1;
const int AllapotLEDpin = D2;
float paratartalom;
float homersekletCelsius;
int levegominosegPpm;

//#################################################################################################################################################################################################################################

void setup()
{
  pinMode(AdatLEDpin, OUTPUT);
  pinMode(AllapotLEDpin, OUTPUT);
  pinMode(AOUTpin, INPUT);

  Serial.begin(9600);
  dht.begin();

  /*if(WiFi.config(local_IP,gateway,subnet,dns1,dns2)){
    Serial.println("Statikus IP konfigurálva");

    //Állapot sikeres jelzés
    digitalWrite(AllapotLEDpin, HIGH);
    delay(500); 
    digitalWrite(AllapotLEDpin, LOW);
  }else{
    Serial.println("Statikus IP konfigurálása sikertelen!");
    //Állapot sikertelen jelzés
    digitalWrite(AllapotLEDpin, HIGH);
    delay(500); 
    digitalWrite(AllapotLEDpin, LOW);
    delay(500);
    digitalWrite(AllapotLEDpin, HIGH);
    delay(500); 
    digitalWrite(AllapotLEDpin, LOW);
  }*/

  WiFi.disconnect();
  WiFi.begin(ssid,password);


  int countTime = 0;
  Serial.print("Csatlakozás...");
  while(WiFi.status() != WL_CONNECTED && countTime > 20){
    countTime++;
    Serial.print(".");
    delay(500);
  }
  if(WiFi.isConnected() == false ){
    Serial.println("Sikertelen WiFi kapcsolódás!");
  } else {
    Serial.println("");
    Serial.println("WiFi kapcsolódás sikeres!");  
    Serial.println(WiFi.localIP());
    //Állapot sikeres jelzés
    digitalWrite(AllapotLEDpin, HIGH);
    delay(500); 
    digitalWrite(AllapotLEDpin, LOW);
  }

  //LED setup teszt
  digitalWrite(AdatLEDpin, HIGH);
  digitalWrite(AllapotLEDpin, HIGH);
  delay(3000);
  digitalWrite(AdatLEDpin, LOW);
  digitalWrite(AllapotLEDpin, LOW);
  
 }

//################################################################################################################################################################################################################################# 

void adatKuldes(float paratartalom, float homerseklet, int ppm, String eszköz_ip){
  const char *URL = "http://192.168.21.74/Project2024/public/api/fusterzekelo2/beszuras";
  String data = "paratartalom="+String(paratartalom)+"&homerseklet="+String(homerseklet)+"&ppm="+String(ppm)+"&eszköz_ip="+String(eszköz_ip);
  httpClient.begin(client,URL);
  httpClient.addHeader("Content-Type","application/x-www-form-urlencoded");
  httpClient.POST(data);
  String content = httpClient.getString();
  httpClient.end();
  Serial.println(" ");
  Serial.print("Páratartalom, hőmérséklet és levegőminőség RESPONSE: ");
  Serial.println(content);
}

//#################################################################################################################################################################################################################################

void loop()
{
  paratartalom= dht.readHumidity();
  homersekletCelsius= dht.readTemperature();
  levegominosegPpm = analogRead(0);

  if (isnan(paratartalom) || isnan(homersekletCelsius)){
    Serial.println("Sikertelen páratartalom és hőmérskéklet beolvasás, ellenőrizd a kábeleket!");
    //Állapot sikertelen jelzés
    digitalWrite(AllapotLEDpin, HIGH);
    delay(500); 
    digitalWrite(AllapotLEDpin, LOW);
    delay(500);
    digitalWrite(AllapotLEDpin, HIGH);
    delay(500); 
    digitalWrite(AllapotLEDpin, LOW);
  }else{
    Serial.print("Páratartalom: ");
    Serial.print(paratartalom);
    Serial.print("%");
    Serial.print("  ||  ");
    Serial.print("Hőmérséklet: ");
    Serial.print(homersekletCelsius);
    Serial.print("°C");
    Serial.print("  ||  ");
    } 

  if (levegominosegPpm <= 10){
    Serial.println("Sikertelen levegőminőség beolvasás, ellenőrizd a kábeleket!");
    digitalWrite(AllapotLEDpin, HIGH);
    delay(500); 
    digitalWrite(AllapotLEDpin, LOW);
    delay(500);
    digitalWrite(AllapotLEDpin, HIGH);
    delay(500); 
    digitalWrite(AllapotLEDpin, LOW);
  }else{
    Serial.print("Levegőminőség: ");
    Serial.print(levegominosegPpm, DEC);
    Serial.print(" ppm");
    Serial.print("  ||  ");
  }

  //Adatküldés és annak a LED jelzése
  Serial.println(WiFi.localIP().toString());
  adatKuldes(paratartalom, homersekletCelsius, levegominosegPpm, WiFi.localIP().toString());
  digitalWrite(AdatLEDpin, HIGH);

  delay(6000); 

  digitalWrite(AdatLEDpin, LOW);
}
