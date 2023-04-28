<?php
session_start();
require_once('config.php');

$json=array();
$sql ='DELETE FROM documento WHERE Id="'.$_REQUEST['Id'].'"';
$result =$connection->query($sql);
echo json_encode($json);
?>