<?php 
require_once "connection.php";
$mysqli = new mysqli($servername, $username, $password, $dbname);
// // Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

class sensorData{
  public function getData(){
    global $mysqli;
    $query = "SELECT * FROM coba";
    $query = array();
    $result = $mysqli->query($query);
    while($row = mysqli_fetch_obect($result)){
    $data[] = $row;
  }
   $response=array(
                     'status' => 1,
                     'message' =>'Get List Sensor Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);

}
public function getDatas($id=0)
   {
      global $mysqli;
      $query="SELECT * FROM testing";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get Sensor Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
        
   }

    public function insertData()
      {
         global $mysqli;
         $arrcheckpost = array('nama' => '', 'sensor_kelembaban' => '', 'sensor_n' => '', 'sensor_p' => '', 'sensor_k'   => '', 'sensor_ph'   => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
               $result = mysqli_query($mysqli, "INSERT INTO testing SET
               nama = '$_POST[nama]',
               sensor_kelembaban = '$_POST[sensor_kelembaban]',
               sensor_n = '$_POST[sensor_n]',
               sensor_p = '$_POST[sensor_p]',
              sensor_k = '$_POST[sensor_k]',
               sensor_ph = '$_POST[sensor_ph]'");
                
               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'Sensor Added Successfully.'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'Sensor Addition Failed.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }

 function updateData($id)
      {
         global $mysqli;
         $arrcheckpost = array('nama' => '', 'sensor_kelembaban' => '', 'sensor_n' => '', 'sensor_p' => '', 'sensor_k'   => '', 'sensor_ph'   => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
              $result = mysqli_query($mysqli, "UPDATE testing SET
               nama = '$_POST[nama]',
               sensor_kelembaban = '$_POST[sensor_kelembaban]',
               sensor_n = '$_POST[sensor_n]',
               sensor_p = '$_POST[sensor_p]',
              sensor_k = '$_POST[sensor_k]',
              WHERE id='$id'");
          
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'sensor Updated Successfully.'
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'sensor Updation Failed.'
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function deleteData($id)
   {
      global $mysqli;
      $query="DELETE FROM testing WHERE id=".$id;
      if(mysqli_query($mysqli, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'data Deleted Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'data Deletion Failed.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
}



?>