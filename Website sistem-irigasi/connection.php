<?php
$dbname = "sensortes";
$servername = "localhost";
$username = "root";
$password= "";

// Start using PDO
$pdo = "mysql:host=$servername; dbname=$dbname";
$connection = new PDO( "mysql:host=$servername;dbname=$dbname", 'root', '');
if(!$connection){
	die("Fatal Error: Connection Failed!");
}
?>