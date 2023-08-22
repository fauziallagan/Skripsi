<?php
require_once "method.php";
$dataSensor = new sensorData();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            $dataSensor->getData($id);
         }
         else
         {
            $dataSensor->getDatas();
         }
         break;
   case 'POST':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            $dataSensor->updateData($id);
         }
         else
         {
            $dataSensor->insertData();
         }     
         break; 
   case 'DELETE':
          $id=intval($_GET["id"]);
            $dataSensor->deleteData($id);
            break;
   default:
      // Invalid Request Method
         header("HTTP/1.0 405 Method Not Allowed");
         break;
      break;
}
 
 
 
 
?>