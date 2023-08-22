<!-- UDAH DI TES DAN OK -->


<?php
require '../api/connection.php';
$page = $_SERVER['PHP_SELF'];
$timer = "10";

// Start using PDO
$pdo = "mysql:host=$servername; dbname=$dbname";
$connection = new PDO( "mysql:host=$servername;dbname=$dbname", 'root', '');
if(!$connection){
	die("Fatal Error: Connection Failed!");
}

try{
// code here!

$sql = 'SELECT id, nama,sensor_kelembaban,sensor_n,sensor_p,sensor_k,sensor_ph, timestamp FROM coba';
// $row = $connection-> query($sql);
$row = $connection->prepare($sql);
$row->execute();
$row->setFetchMode(PDO::FETCH_ASSOC);
}
catch(PDOException $e){
die('your Connection database is die!'. $e->getMessage());
}

?>

<!-- HTML AREA -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
 <meta http-equiv="refresh" content="<?php echo $timer?>;URL='<?php echo $page?>'">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Testing Output</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
</head>
<body>
  <div class="jumbotron">
<div class="judul"><p class="text-center">OUTPUT SENSOR</p></div>
<a target="_blank" href="coba.php"> <button type="button" class="btn btn-primary"> Export Data</button></a>
<a target="_blank" href="deleted.php"> <button type="button" class="btn btn-danger"> Clear Data</button></a>
</div>
<div class="container">
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">nama</th>
      <th scope="col">kelembaban</th>
      <th scope="col">sensor N</th>
      <th scope="col">sensor P</th>
      <th scope="col">sensor K</th>
      <th scope="col">PH</th>
          <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
    <?php  while ($rows = $row->fetch()):?>
  <?php $id = $rows['id'];
  $nama = $rows['nama'];
  $kelembaban = $rows['sensor_kelembaban'];
  $sensor_n = $rows ['sensor_n'];
  $sensor_p = $rows['sensor_p'];
  $sensor_k = $rows['sensor_k'];
  $ph = $rows ['sensor_ph'];
  $times =$rows['timestamp'];
?>
<tr>
  <td><?php echo $id?></td>
 <td><?php echo $nama?></td>
 <td><?php echo $kelembaban?></td>
 <td><?php echo $sensor_n?></td>
  <td><?php echo $sensor_p?></td>
 <td><?php echo $sensor_k?></td>
 <td><?php echo $ph?></td>
  <td><?php echo $times?></td>
                                
</tr>
<?php endwhile;?>

  </tbody>
</table>
</div>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
              </body>
</html>