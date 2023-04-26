<?php
session_start();
require_once('config.php');

$sql ='SELECT * FROM documento WHERE Id="'.$_REQUEST['Id'].'"';
$result =$connection->query($sql);
$json=array();
if($result->num_rows>0){
    while($row=mysqli_fetch_assoc($result)){
        echo $row;
        array_push($json,$row);
    }
    
}
echo json_encode($json);
?>