<?php
$dbname = "";
$servername = "";
$username = "";
$password= "";

// Start using PDO
$pdo = "mysql:host=$servername; dbname=$dbname";
$connection = new PDO( "mysql:host=$servername;dbname=$dbname", '', '');
if(!$connection){
	die("Fatal Error: Connection Failed!");
}
?>