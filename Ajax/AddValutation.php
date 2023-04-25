<?php
session_start();
require_once('config.php');

//echo'<script>alert("ciao");</script>';

$sql ='SELECT * FROM documento WHERE Id_Operatore="'.$_SESSION['Id'].'"';
$result =$connection->query($sql);
$json=array();
if($result->num_rows>0){
    //echo '<pre>';
    while($row=mysqli_fetch_assoc($result)){
        array_push($json,$row);
        //console.log($row);
       //$data=$row;
       //print_r($row);
    }
    
}
echo json_encode($json);
/*echo 'ciaoo';
header('Content-Type: application/json');
$count1 = $_GET["count1"];
$count1++;
echo json_encode(["count1" => $count1, "content" => "<h1></h1>Count1: $count1</h1>"]);*/

?>