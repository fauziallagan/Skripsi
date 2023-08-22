#include <SPI.h>
#include <LoRa.h>

#define soil A0
int  moistAnalog, moistPercent;
void setup() {
  // put your setup code here, to run once:
  Serial.begin (9600);

    
    if (!LoRa.begin (915E6))
    {
        Serial.println ("LoRa Gagal Dimulai");
        while (1);
    }
}

void loop() {
  // put your main code here, to run repeatedly:
int counter = random(100);
 Serial.print("Sending packet: ");

//  moist sensor
   moistAnalog   = analogRead (soil);
  moistPercent  = random(100);
  String sensor1   = String (moistPercent);
  
  String field = "Lora";
  //  int kelembaban1 = random(100);
   int np= random(255);
   int pn=random(255);
   int kn =random(255);
   int php = random(12);
   int rssis = LoRa.packetRssi();
  
  
  // Dummy Data
  //  String sensor1 = String(msgMoist);
   String sensor2 = String(np);
   String sensor3 = String(pn);
   String sensor4 = String(kn);
   String sensor5 = String(php);
   String rssi = String(rssis);
   Serial.println(field);
   Serial.println(sensor1);
   Serial.println(sensor2);
   Serial.println(sensor3);
   Serial.println(sensor4);
   Serial.println(sensor5);

  
  //Send LoRa packet to receiver
  LoRa.beginPacket ();
  LoRa.print (field);
  LoRa.print ("#");
  LoRa.print (sensor1);
  LoRa.print ("#");
  LoRa.print (sensor2);
  LoRa.print ("#");
  LoRa.print (sensor3);
  LoRa.print ("#");
  LoRa.print (sensor4);
  LoRa.print ("#");
  LoRa.print (sensor5);
  LoRa.print ("#");
  LoRa.print(rssi);
  LoRa.print("#");
  delay(5000);
  LoRa.endPacket();
}
