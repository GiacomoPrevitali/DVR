<?php
session_start();
if(isset($_POST['Id'])){
    $Id=$_POST['Id'];
   // echo json_encode(array('message' => $Id));
require_once('config.php');

$sql ='SELECT * FROM documento WHERE Id="'.$Id.'"';
$result =$connection->query($sql);
$json=array();
if($result->num_rows>0){
    while($row=mysqli_fetch_assoc($result)){
        array_push($json,$row);
    }
    
}
echo json_encode($json);
}
?>
