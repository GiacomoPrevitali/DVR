<?php
session_start();
if(isset($_SESSION['Nome'])){
    require_once('config.php');
       
    $sql='INSERT INTO users (Id, Nome, Cognome, Permesso, Username, Pass, RagioneSociale) VALUES (NULL,"'.$_REQUEST['Nome'].'", "'.$_REQUEST['Cognome'].'", "'.$_REQUEST['Permessi'].'", "'.$_REQUEST['Username'].'", "'.md5($_REQUEST['Password']).'", "'.$_REQUEST['Ragione'].'")';
         
    $result =$connection->query($sql);

    echo json_encode(array('message' => 'Utente aggiunto con successo!'));
}
?>