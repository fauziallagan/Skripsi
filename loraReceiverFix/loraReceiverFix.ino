/*
    Serial Value 1 = AREA
    Serial Value 2 = MOISTURE PERCENT
*/

/*
    LoRa Value 1 = AREA
    LoRa Value 2 = MOISTURE PERCENT
    LoRa Value 3 = pH (0-14)
    LoRa Value 4 = NITROGEN (MG/KG)
    LoRa Value 5 = PHOSPHORUS (MG/KG)
    LoRa Value 6 = KALIUM/POTASSIUM (MG/KG)
*/
#include <SPI.h>
#include <LoRa.h>
// Libraries for OLED Display
#include <Wire.h>
#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>
#ifdef ESP32
#include <WiFi.h>
#include <HTTPClient.h>
#else
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#endif

#include <elapsedMillis.h>
const char* ssid     = "muro";
const char* password = "Piscok2000";
const char* serverName = "http://192.168.1.105/sistem-irigasi/post-data.php";
// const char* serverName = "http://192.168.1.100/sistem-irigasi/post-data.php"; // raspberry old
// const char* serverName = "http://192.168.94.103/Website%20Irigasi%20Tetes/sistem-irigasi/post-data.php";
String apiKeyValue = "esp";

#define BAND 915E6
#define SCK 5
#define MISO 19
#define MOSI 27
#define SS 18
#define RST 14
#define DIO0 26

#define OLED_SDA 21
#define OLED_SCL 22
#define OLED_RST 16
#define SCREEN_WIDTH 128
#define SCREEN_HEIGHT 64


elapsedMillis sendMillis;
elapsedMillis OLEDPrintMillis;
Adafruit_SSD1306 display(SCREEN_WIDTH, SCREEN_HEIGHT, &Wire, OLED_RST);

unsigned long sendInterval = 2000;
unsigned long OLEDPrintInterval = 3000;

String target1 = "L1";
String target2 = "L2";
String target3 = "L3";
String target4 = "L4";

byte turn;

String
moist1,
pH1, nitro1, phos1, kal1,
moist2, pH2, nitro2, phos2, kal2,
moist3, pH3, nitro3, phos3, kal3,
moist4, pH4, nitro4, phos4, kal4;

elapsedMillis webRequest;
elapsedMillis requestMillis;
elapsedMillis OLEDMillis;
elapsedMillis serialMillis;
unsigned int webInverval = 10000;
unsigned int requestInterval = 3000;
unsigned int OLEDInterval = 1000; // 1000
unsigned int serialInterval = 2000;


void setup()
{
  Serial.begin(115200);

  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());

  /*================= CAUTION ===============
    THIS IS EXPERIMENTAL  FEATURE!, CHECK THIS SCRIPT IF FIND SOME PROBLEM OR ERROR
    Serial2.begin(115200); // experiment
  */
  pinMode(OLED_RST, OUTPUT);
  digitalWrite(OLED_RST, LOW);
  delay(20);
  digitalWrite(OLED_RST, HIGH);

  Wire.begin(OLED_SDA, OLED_SCL);
  if (!display.begin(SSD1306_SWITCHCAPVCC, 0x3c, false, false))
  { // Address 0x3C for 128x32
    Serial.println(F("SSD1306 allocation failed"));
    for (;;)
      ; // Don't proceed, loop forever
  }
  // SPI LoRa pins
  SPI.begin(SCK, MISO, MOSI, SS);
  // setup LoRa transceiver module
  LoRa.setPins(SS, RST, DIO0);
  if (!LoRa.begin(BAND))
  {
    Serial.println("Starting LoRa failed!");
    while (1)
      ;
  }
  Serial.println("LoRa Initializing OK!");

  initLoRa();
  initOLED();

}

void loop()
{

  String area, moist, pH, nitro, phos, kal, rssi; 
   int packetSize = LoRa.parsePacket();
  if (!packetSize == 0)
  {
    while (LoRa.available())
    {
      moist = LoRa.readStringUntil('#');
      pH = LoRa.readStringUntil('#');
      nitro = LoRa.readStringUntil('#');
      phos = LoRa.readStringUntil('#');
      kal = LoRa.readStringUntil('#'); 
      rssi = LoRa.readStringUntil('#');
      sensorSend(moist, pH, nitro, phos, kal, rssi);
      if(webRequest >= webInverval){
       webserver(moist, nitro, phos, kal, pH);
        // rssiValue(rssi);
      }
    }
  }

}

void rssiValue(String sensors){

  String values = sensors;
  int value = values.toInt();
   if (value > -30){ // lebih besar dari -30
    display.setCursor(40, 30);
    display.print("Very Good");


  }
  else if(value > -31 || value > -64){
    display.setCursor(40, 30);
    display.print("Good");

  }
   else if(value > -65  || value > -74){
display.setCursor(40, 30);
    display.print("not Bad");

  }
  else if(value > -75  || value > -89){
display.setCursor(40, 30);
    display.print("bad");

  }
  else if(value < -90){
    display.setCursor(40, 30);
    display.print("Very bad");

  }
  else {
    display.setCursor(40, 30);
    display.print("No Signal");

  }
}
void initLoRa()
{
  SPI.begin(SCK, MISO, MOSI, SS);
  LoRa.setPins(SS, RST, DIO0);
  if (!LoRa.begin(BAND))
  {
    while (1)
      ;
  }
}

void initOLED()
{
  Wire.begin(OLED_SDA, OLED_SCL);
  if (!display.begin(SSD1306_SWITCHCAPVCC, 0x3c, false, false))
  {
    for (;;)
      ;
  }

  display.clearDisplay();
  display.setTextColor(WHITE);
  display.setTextSize(1);
  display.setCursor(0, 0);
  display.print("LORA Starting... ");
  display.display();
  display.clearDisplay();
}

void sensorSend(String sensor1, String sensor2, String sensor3, String sensor4, String sensor5, String sensors)
{ 
  display.setCursor(30, 0);
    display.print("Lora Receiver");
       display.setCursor(0, 10);
    display.print("Lahan 1 : ");
       display.setCursor(0, 20);
    display.print("RSSI : ");
    display.setCursor(0, 50);
    display.print("IP : ");
    display.setCursor(30, 50);
    display.print(WiFi.localIP());
      display.setCursor(0, 30);
    display.print("Web : 192.168.1.100");
   display.setCursor(0, 40);
    display.print("Website : Active");


     String values = sensors;
  int value = values.toInt();
    moist1 = sensor1;
    pH1 = sensor2;
    nitro1 = sensor3;
    phos1 = sensor4;
    kal1 = sensor5;
    sendSerial(moist1);
    int moisturePercent = moist1.toInt();
  
  if (moisturePercent >= 0 && moisturePercent <= 100)
  {

    // Serial.println(moisturePercent);

    if (moisturePercent >= 0 && moisturePercent <= 40)
    {

      Serial.println(moisturePercent);

      display.setCursor(50, 10);
      display.setTextSize(1);
      display.setTextColor(WHITE);
      display.println(moisturePercent);
      display.setCursor(40, 20);
      display.print(values);
      display.display();

    }
     else if (moisturePercent >= 41 && moisturePercent <= 100)
    {
      display.setCursor(50, 10);
      display.setTextSize(1);
      display.setTextColor(WHITE);
      display.println(moisturePercent);
      display.setCursor(40, 20);
      display.print(values);
      display.display();
    }
  }
   display.clearDisplay();
}


void sendSerial(String sensor1)
{
  Serial.print(sensor1);
  Serial.print('#');
}

void webserver(String moists, String nitros, String phost, String kals, String pHs) {
  //Check WiFi connection status
  if(WiFi.status()== WL_CONNECTED){
    WiFiClient client;
    HTTPClient http;
    
    // Your Domain name with URL path or IP address with path
    http.begin(client, serverName);
   String nama = "Lahan 1 ";
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    
    // Prepare your HTTP POST request data
    String httpRequestData = "api_key=" + apiKeyValue + "&nama=" + nama + "&sensor_kelembaban=" + moists + "&sensor_n=" + nitros + "&sensor_p=" + phost + "&sensor_k=" + kals + "&sensor_ph=" + pHs;

    int httpResponseCode = http.POST(httpRequestData);
    if (httpResponseCode>0) {
    }
    else {
    }
    // Free resources
    http.end();
  }
  else {
    // Serial.println("WiFi Disconnected");
  }
  //Send an HTTP POST request every 30 seconds
  // delay(3000);  

}