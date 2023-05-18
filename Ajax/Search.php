<?php
session_start();
require_once('config.php');
if(isset($_REQUEST['RS'])){
    if($_REQUEST['RS']!=""){
    $sql ='SELECT * FROM documento WHERE Nome="'.$_REQUEST['RS'].'"';
    }else{
        $sql ='SELECT * FROM documento';
    }

    $result =$connection->query($sql);
    $json=array();
    if($result->num_rows>0){
        while($row=mysqli_fetch_assoc($result)){
            array_push($json,$row);
        }
    }else{
        array_push($json,array("Nome"=>"A"));
    }
    // array_push($json,"ok"=>"ok");

    echo json_encode($json);
}

?>