<?php
/*session_start();
require_once('config.php');

header('Content-Type: application/json');

$sql ='SELECT * FROM documento WHERE Id_Operatore="'.$_SESSION['Id'].'"';
$result =$connection->query($sql);
if($result->num_rows>0){
    $data =[];
    while($row=$result->fetch_assoc()){
        console.log($row);
    }
    {
        console.log($row);
    }
    echo json_encode($row);
}*/
//echo '<script>alert("ciao");</script>'
header('Content-Type: application/json');
if(isset($_GET["count"]) && $_GET["count"] != ""){
    $count1 = $_GET["count"];
    $count1++;
    echo json_encode(["count" => $count1, "content" => "<h1></h1>Count: $count1</h1>"]);
}


?>