<?php
session_start();
include("config.php");

  $query ='SELECT * FROM documento WHERE Id_Operatore="'.$_SESSION['Id'].'"';
  $result =$connection->query($sql);
  $datiDVR=[];
  $count=0;
  if($result->num_rows>0){
    while ($row = $result->fetch_assoc()) {
        $datiDVR[$count] = $row;
        $count++;
        echo $datiDVR[$count];
    }
  }
  //echo json_encode($datiDVR);
  
?>