<?php 
require_once "connection.php";
try{
    $id = saring($_GET['id_mesin']);
    $sql = "UPDATE  kalibrasi SET is_deleted = true WHERE id_mesin=:id_mesin"; // Edited! Where is_deleted = true (soft deleted)
    $stmt = $connection->prepare($sql);
    $stmt->execute([':id_mesin'=>$id]);
    if($stmt){
        header("Location:calibration.php");
    }else{
        header("Location: error.php"); 
    }
}catch(PDOException $e){
    echo $e->getMessage();
}

?>