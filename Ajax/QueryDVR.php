<?php
session_start();
require_once('config.php');
if($_SESSION['Permesso']==2){
$sql ='SELECT * FROM documento WHERE Nome="'.$_SESSION['Ragione'].'"';
}else if($_SESSION['Permesso']==0){
$sql ='SELECT * FROM documento WHERE Id_Operatore="'.$_SESSION['Id'].'"';
}else{
$sql ='SELECT * FROM documento';
}
$result =$connection->query($sql);
$json=array();
if($result->num_rows>0){
    while($row=mysqli_fetch_assoc($result)){
        array_push($json,$row);
    }
   // array_push($json,"ok"=>"ok");
}
echo json_encode($json);
?>