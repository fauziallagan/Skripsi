<?php 
include "header.php";
require "connection.php";
try{
$sql = 'SELECT * FROM coba';
  $row = $connection->query($sql);
  $row->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("Connection to Database Failed!. Please Check Database Connection!!" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tutorial PHP Datatables Dengan PHP Dan MySQL</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>

</head>
<body>   
    <div class="container-xl px-4 mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">Extended DataTables</div>
                            <div class="card-body">
  <table id="data" class="table table-striped">
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
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables/datatables-simple-demo.js"></script>
  <script>
    $(document).ready(function(){
        $('#data').DataTable();
    });
</script>
</body>
</html>