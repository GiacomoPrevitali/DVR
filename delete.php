<?php
   session_start();
       $ip= '127.0.0.1';
       $username='root';
       $password='';
       $database='dvr';
       //come richiamare la funzione javascript deleterow()?


        $Id=echo 'deleteRow()';
       $connection=new mysqli($ip,$username,$password,$database);
       if ($connection->connect_error) {
           die('C\'è stato un errore: ' . $connection->connect_error);
       }
       $sql ='DELETE FROM documento WHERE Id="'.$_GET['Id'].'"';
       $result =$connection->query($sql);

       $DataVal=$_POST['Id'];
       echo json_encode(array('message' => $DataVal));


?>