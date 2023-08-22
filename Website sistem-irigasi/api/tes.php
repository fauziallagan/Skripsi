<?php
require 'connection.php';
// $page = $_SERVER['PHP_SELF'];
// $timer = "1";
$pdo = "mysql:host=$servername; dbname=$dbname";
$connection = new PDO( "mysql:host=$servername;dbname=$dbname", 'root', '');
if(!$connection){
	die("Fatal Error: Connection Failed!");
}
try {
  // $sql = 'SELECT * FROM testing';
  $db = $connection->prepare('SELECT * FROM testing');
 $db->execute();
 $data = $db->fetchAll(PDO::FETCH_ASSOC);
  // $row->setFetchMode(PDO::FETCH_ASSOC);
  $datas = json_encode($data);
  echo $datas;

} catch (PDOException $e) {
  die("Connection to Database Failed!. Please Check Database Connection!!" . $e->getMessage());
}
?>