# Sistem-Cerdas-IKN
Run Website -> 192.168.1.105/irigasi-tetes

# Schematic Lora Server
![Logo](https://github.com/fauziallagan/Skripsi/blob/main/skematikSmartFarm%20update_bb.png)

# Schematic Lora Client
![Logo](https://github.com/fauziallagan/Skripsi/blob/main/Skematik%20Client.png)

# Documentation

## Lora TTGO T-Beam Pin Use to Logic Converter

| PIN Lora | Type     | Pin Logic Converter           | Pin Mega| 
| :-------- | :------- | :------------------------- |  :------- |
| `RX` | `Communication Serial` |  `RX`|`TX` |
| `TX` | `Communication Serial` | `TX` |`RX`|
| `GND` | `Ground` | `GND` |`GND`|
| `3.3V` | `VCC` | `LV/HV` | `5V`|


## Example Receiver arduino Mega -> Logic Converter <- Lora TTGO

```c++
  void setup() {
  // put your setup code here, to run once:
  Serial.begin(115200);
  Serial3.begin(9600);
}
void loop() {
  Serial.println("Message Received: ");
  Serial.println(Serial3.readString());
```
## Example SEND packet lora client to Server or other Lora
```c++
 LoRa.beginPacket();
  LoRa.print(soilmoisturepercent);
  LoRa.print('#');
  LoRa.print(rssi);
  LoRa.print('#');
  LoRa.endPacket();
```
## Example RECEIVER packet from lora Client or other Lora
```c++

 int packetSize = LoRa.parsePacket();
  if (packetSize)
  {
    while (LoRa.available())
    {
      area = LoRa.readStringUntil('#');
      moist = LoRa.readStringUntil('#');
      pH = LoRa.readStringUntil('#');
      nitro = LoRa.readStringUntil('#');
      phos = LoRa.readStringUntil('#');
      kal = LoRa.readStringUntil('#');
      sensorSend(area, moist, pH, nitro, phos, kal);
    }
  }
```
## Example Lora Web Server Old Version
Using port 80 for running webserver
```c++
AsyncWebServer server(80);
AsyncEventSource events("/events");
JSONVar readings;
```
Reading data from sensor and change data tipe from integer to String
```c++
String getSensorReadings()
{
  readings["kelembabanLahan1FromArduino"] = String(moist1); // edited
  readings["natriumLahan1FromArduino"] = String(nitro1);
  readings["potasiumLahan1FromArduino"] = String(phos1);
  readings["kaliumLahan1FromArduino"] = String(kal1);
  readings["phLahan1FromArduino"] = String(pH1);
   String jsonString = JSON.stringify(readings);
  return jsonString;
```
example run server and request webserver using SPIFFS and execute file index.html
```c++
 server.on("/", HTTP_GET, [](AsyncWebServerRequest *request)
            { request->send(SPIFFS, "/index.html", "text/html"); });

  server.serveStatic("/", SPIFFS, "/");

  server.on("/readings", HTTP_GET, [](AsyncWebServerRequest *request)
            {
    String json = getSensorReadings();
    request -> send (200, "application/json", json);
    json = String(); });

  events.onConnect([](AsyncEventSourceClient *client)
                   { client->send("Request -> ", NULL, millis(), 10000); });

  server.addHandler(&events);

  server.begin();
```

## Rumus pH Tanah
```c++
void pHRead()
{
  pHAnalog  = analogRead (pH);
  pHValue   = (0.002888143 * pHAnalog)-0.50;
  msgPH     = String (pHValue);
}
```

## Rumus Soil Moisture
```c++
void moistRead()
{
  moistAnalog   = analogRead (soil);
  moistPercent  = map (moistAnalog, 1620, 4095, 100, 0);
  msgMoist      = String (moistPercent);
}
```

## Rumus NPK

```c++

const byte nitro[]  = {0x01,0x03, 0x00, 0x1e, 0x00, 0x01, 0xe4, 0x0c};
const byte phos[]   = {0x01,0x03, 0x00, 0x1f, 0x00, 0x01, 0xb5, 0xcc};
const byte kal[]    = {0x01,0x03, 0x00, 0x20, 0x00, 0x01, 0x85, 0xc0};

byte NValue, PValue, KValue;
void NPKRead()
{
  NValue = NRead();
  delay (250);
  PValue = PRead();
  delay (250);
  KValue = KRead();
  delay (250);
  msgNitro  = String (NValue, HEX);
  msgPhos   = String (PValue, HEX);
  msgKal    = String (KValue, HEX);
}

byte NRead()
{
  // clear the receive buffer
  Serial.flush();

  // switch RS-485 to transmit mode
  digitalWrite(DE_MAX485, HIGH);
  digitalWrite(RE_MAX485, HIGH);
  delay(10);

  // write out the message
  for (uint8_t i = 0; i < sizeof(nitro); i++) Serial.write(nitro[i]);

  // wait for the transmission to complete
  Serial.flush();

  // switching RS485 to receive mode
  digitalWrite(DE_MAX485, LOW);
  digitalWrite(RE_MAX485, LOW);

  // delay to allow response bytes to be received!
  delay(500);

  // read in the received bytes
  for (byte i = 0; i < 7; i++) 
  {
    values[i] = Serial.read();
  }

  return values[4];
}

byte PRead()
{
  Serial.flush();
  digitalWrite(DE_MAX485, HIGH);
  digitalWrite(RE_MAX485, HIGH);
  delay(10);
  for (uint8_t i = 0; i < sizeof(phos); i++) Serial.write(phos[i]);

  Serial.flush();
  digitalWrite(DE_MAX485, LOW);
  digitalWrite(RE_MAX485, LOW);
  delay(500);
  for (byte i = 0; i < 7; i++) 
  {
    values[i] = Serial.read();
  }

  return values[4];
}

byte KRead()
{
  Serial.flush();
  digitalWrite(DE_MAX485, HIGH);
  digitalWrite(RE_MAX485, HIGH);
  delay(10);
  for (uint8_t i = 0; i < sizeof(kal); i++) Serial.write(kal[i]);

  Serial.flush();
  digitalWrite(DE_MAX485, LOW);
  digitalWrite(RE_MAX485, LOW);
  delay(500);
  for (byte i = 0; i < 7; i++) 
  {
    values[i] = Serial.read();
  }

  return values[4];
}

```
## Example Webserver Drip Irigation with Raspberry Pi NEW Version
<h2>🛠️ Arduino IDE</h2>

<p>1. ubah SSID dan Password)</p>

```php
const char* ssid     = "YOUR SSID";
const char* password = "YOUR PASSWORD";
```
<p>1. isi ip untuk post data</p>

```php
const char* serverName = "http://YOUR IP /POST.php";
```

<p>1. buat API Key (mikon dan web harus sama)</p>

```php
String apiKeyValue = "YOUR_API_KEY";
```

<p>2. data yang akan di post ke server</p>

```php
String httpRequestData = ""
```

<p>3. status code</p>

``` php
if (httpResponseCode>0) 
{
  Serial.print("HTTP Response code: ");
  Serial.println(httpResponseCode);
}    
 else {
 Serial.print("Error code: ");
 Serial.println(httpResponseCode):     
}
```

<h2>🛠️ file PHP (connection.php)</h2>
<p>ubah bagian connection.php sesuai kebutuhan</p>

```php
$dbname = "YOUR DATABASE NAME";
$servername = "YOUR SERVERNAME";
$username = "YOUR USERNAME";
$password= "YOUR PASSWORD";
```

<p>PHP menggunakan PDO (PHP DATA OBJECT)</p>

```php
$pdo = "mysql:host=$servername; dbname=$dbname";
function saring($data){
$data = trim($data);
$data = stripcslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$connection = new PDO( "mysql:host=$servername;dbname=$dbname", 'YOUR USERNAME', 'YOUR PASSWORD');
	if(!$connection){
		die("Fatal Error: Connection Failed!");
	}
```

<p>PHP menggunakan MYSQLI</p>

```php
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
```


<h2>🛠️ file PHP (post-data.php)</h2>
<p>code import connection.php</p>

```php
require "connection.php";
```
<p>code membuat api untuk validasi api dari arduino</p>

```php
$api_key_value = "YOUR API KEY";
```

<p>code membuat variabel untuk menampung sensor dari arduino</p>

```php
$api_key= $nama = $sensor_kelembaban=$sensor_n=$sensor_p=$sensor_k=$sensor_ph= "";
```

<p>code melakukan pengecekan dan  publish data ke database</p>

```php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = saring($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $nama = saring($_POST["nama"]);
        $sensor_kelembaban = saring($_POST["sensor_kelembaban"]);
        $sensor_n = saring($_POST["sensor_n"]);
        $sensor_p = saring($_POST["sensor_p"]);
        $sensor_k = saring($_POST["sensor_k"]);
        $sensor_ph = saring($_POST["sensor_ph"]);
        try{        
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO testing (nama, sensor_kelembaban,sensor_n,sensor_p,sensor_k, sensor_ph)VALUES ('" . $nama . "', '" . $sensor_kelembaban . "','" . $sensor_n . "','" . $sensor_p . "','" . $sensor_k . "','" . $sensor_ph . "')";
			$connection->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$connection = null;
    
        $connection->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}
```
