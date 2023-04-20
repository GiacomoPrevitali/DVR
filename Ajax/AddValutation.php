<?php
session_start();
require_once('config.php');

//echo'<script>alert("ciao");</script>';

$sql ='SELECT * FROM documento WHERE Id_Operatore="'.$_SESSION['Id'].'"';
$result =$connection->query($sql);
if($result->num_rows>0){
    $data =[];
    while($row=mysqli_fetch_assoc($result)){
        //console.log($row);
       $data=$row;
    }
    echo json_encode($data);
}
/*echo 'ciaoo';
header('Content-Type: application/json');
$count1 = $_GET["count1"];
$count1++;
echo json_encode(["count1" => $count1, "content" => "<h1></h1>Count1: $count1</h1>"]);*/

?>