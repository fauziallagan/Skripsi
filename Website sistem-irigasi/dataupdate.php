<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sensortes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM coba WHERE nama = 'Lora 0'  ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  // Mengubah data menjadi format JSON
  $data = array(
    "sensor_kelembaban" => $row["sensor_kelembaban"],
    "sensor_n" => $row["sensor_n"],
    "sensor_p" => $row["sensor_p"],
    "sensor_k" => $row["sensor_k"],
    "sensor_ph" => $row["sensor_ph"]

  );
  echo json_encode($data);
} else {
  echo "0 results";
}
$conn->close();
?>
