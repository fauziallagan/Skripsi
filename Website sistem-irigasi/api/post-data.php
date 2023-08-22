<!-- UDAH DI TES DAN OK -->
<?php
require "../connection.php";
// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "irigasi";

$api_key= $nama = $sensor_kelembaban=$sensor_n=$sensor_p=$sensor_k=$sensor_ph= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = saring($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $nama = saring($_POST["nama"]);
        $sensor_kelembaban = saring($_POST["sensor_kelembaban"]);
        $sensor_n = saring($_POST["sensor_n"]);
        $sensor_p = saring($_POST["sensor_p"]);
        $sensor_k = saring($_POST["sensor_k"]);
        $sensor_ph = saring($_POST["sensor_ph"]);
    
        // Create connection
      
try{        
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO coba (nama, sensor_kelembaban,sensor_n,sensor_p,sensor_k, sensor_ph)VALUES ('" . $nama . "', '" . $sensor_kelembaban . "','" . $sensor_n . "','" . $sensor_p . "','" . $sensor_k . "','" . $sensor_ph . "')";
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
?>