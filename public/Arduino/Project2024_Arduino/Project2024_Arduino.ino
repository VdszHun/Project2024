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
Ennek a könyvtárnak a letöltésekor fogadjuk el az ahhoz szükséges további könyvtárak letöltését is.

-Vadász Dávid
*/

#include "DHT.h"
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ESP8266WebServer.h>

#define DHTPIN D5
#define DHTTYPE DHT11

/*
Módosítandó adatok füstérzékelő kihelyezésekor:
ssid = A hálózat neve
password = a hálózat jelszava

Például:
#define ssid "Cisco3"
#define password "Eotvos2024"
*/
#define ssid "Cisco4"
#define password "Eotvos2023"

ESP8266WebServer server(80); // Create a web server listening on port 80

DHT dht(DHTPIN,DHTTYPE);

/*
Az alábbi rész olyan hálózatokra van ahol nem engedélyezett a dinamikus (DHCP) kapcsolódás, alapesetben ez kommentbe van téve, 
viszont ha a hálózat manuális ki kell venni belőle és beírni az adott címeket a hálózatének megfelelően.
*/

/*
IPAddress subnet(255,255,0,0);
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
int hibakod = 0;
bool datasend = HIGH;
bool ledtest = HIGH;

//#################################################################################################################################################################################################################################
//web buttons void

void handleToggledatasend() {
  datasend = !datasend; // Toggle homero state

  server.send(200, "text/plain", String(datasend)); // Send response back to client
}

void handleToggletestled() {
  ledtest = !ledtest; // Toggle homero state

  server.send(200, "text/plain", String(ledtest)); // Send response back to client
}

//#################################################################################################################################################################################################################################

void setup()
{
  pinMode(AdatLEDpin, OUTPUT);
  pinMode(AllapotLEDpin, OUTPUT);
  pinMode(AOUTpin, INPUT);

  Serial.begin(9600);
  dht.begin();

/*
Az alábbi rész olyan hálózatokra van ahol nem engedélyezett a dinamikus (DHCP) kapcsolódás, alapesetben ez kommentbe van téve, 
viszont ha a hálózat manuális ki kell venni belőle.
*/

  /*if(WiFi.config(local_IP,gateway,subnet,dns1,dns2)){
    Serial.println("Statikus IP konfigurálva");
  }else{
    Serial.println("Statikus IP konfigurálása sikertelen!");
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

//#################################################################################################################################################################################################################################
//webszerver címek

      server.on("/datasend", HTTP_POST, handleToggledatasend);
      server.on("/ledtest", HTTP_POST, handleToggletestled);
      server.begin();
      Serial.println("Server started");

  //LED setup teszt
  digitalWrite(AdatLEDpin, HIGH);
  digitalWrite(AllapotLEDpin, HIGH);
  delay(3000);
  digitalWrite(AdatLEDpin, LOW);
  digitalWrite(AllapotLEDpin, LOW);

 }

//#################################################################################################################################################################################################################################

void adatKuldes(float paratartalom, float homerseklet, int ppm, String eszköz_ip, int hibakod){
  const char *URL = "http://192.168.0.15/Project2024/public/api/fusterzekelo/beszuras";
  String data = "paratartalom="+String(paratartalom)+"&homerseklet="+String(homerseklet)+"&ppm="+String(ppm)+"&eszköz_ip="+String(eszköz_ip)+"&hibakod="+String(hibakod);
  httpClient.begin(client,URL);
  httpClient.addHeader("Content-Type","application/x-www-form-urlencoded");
  httpClient.POST(data);
  String content = httpClient.getString();
  httpClient.end();
  Serial.println(" ");
  Serial.print("Páratartalom, hőmérséklet és levegőminőség RESPONSE: ");
  Serial.println(content);
}

void hibakodok(int hibakod){

if(ledtest == LOW){

      digitalWrite(AdatLEDpin, LOW);
      digitalWrite(AllapotLEDpin, LOW);

}else{

        int time = 2000;
        int rovid = 1000;
        int hosszu = 3000;

          switch (hibakod) {
            case 0:
                //code 0

                digitalWrite(AllapotLEDpin, HIGH);
                delay(time);
                digitalWrite(AdatLEDpin, HIGH);
                delay(rovid);
                digitalWrite(AdatLEDpin, LOW);
                Serial.println("code 0");
              break;
            case 1:

                //code 1
                digitalWrite(AdatLEDpin, LOW);

                delay(time);
                digitalWrite(AllapotLEDpin, HIGH);
                delay(rovid);
                digitalWrite(AllapotLEDpin, LOW);
                delay(time);
                digitalWrite(AllapotLEDpin, HIGH);
                delay(hosszu);
                digitalWrite(AllapotLEDpin, LOW);


              break;
            case 2:
                //code 2
                digitalWrite(AdatLEDpin, LOW);

                delay(time);
                digitalWrite(AllapotLEDpin, HIGH);
                delay(rovid);
                digitalWrite(AllapotLEDpin, LOW);

                ciklushiba(2,AllapotLEDpin,hosszu,time);


              break;
            case 3:
                //code 3
                digitalWrite(AdatLEDpin, LOW);

                ciklushiba(3,AllapotLEDpin,hosszu,time);

                delay(time);
                digitalWrite(AllapotLEDpin, HIGH);
                delay(rovid);
                digitalWrite(AllapotLEDpin, LOW);

              break;
            case 4:
                //code 4
                digitalWrite(AdatLEDpin, LOW);

                ciklushiba(3,AllapotLEDpin,hosszu,time);
                ciklushiba(2,AllapotLEDpin,hosszu,time);
              break;
        }


    }

}

void ciklushiba(int loop, int led, int kozido, int waiting){

  for (int i = 0; i <= loop; i++) {
    delay(waiting);
    digitalWrite(led, HIGH);
    delay(kozido);
    digitalWrite(led, LOW);
    }

}

//#################################################################################################################################################################################################################################

void loop()
{

  server.handleClient(); // Kliens kérések kezelése
  Serial.println(WiFi.localIP());

  if(datasend == HIGH){

    paratartalom= dht.readHumidity();
    homersekletCelsius= dht.readTemperature();
    levegominosegPpm = analogRead(0);

    if (isnan(paratartalom) || isnan(homersekletCelsius)){
      Serial.println("Sikertelen páratartalom és hőmérskéklet beolvasás, ellenőrizd a kábeleket!");
      hibakod = 1;
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
      hibakod = 2;
    }else{
      Serial.print("Levegőminőség: ");
      Serial.print(levegominosegPpm, DEC);
      Serial.print(" ppm");
      Serial.print("  ||  ");
    }


    Serial.print(WiFi.localIP().toString());
    Serial.print("  ||  ");
    Serial.print("Hibakód: ");
    Serial.println(hibakod);
    //Adatküldés és annak a LED jelzése
    adatKuldes(paratartalom, homersekletCelsius, levegominosegPpm, WiFi.localIP().toString(), hibakod);

    delay(6000);

    if(!isnan(paratartalom) || !isnan(homersekletCelsius) || !levegominosegPpm <= 10){

      hibakod = 0;

    }


    hibakodok(hibakod);



  }else{


    digitalWrite(AdatLEDpin, LOW);
    digitalWrite(AllapotLEDpin, LOW);
    Serial.println("Data send off");
    delay(9000);

  }




}
