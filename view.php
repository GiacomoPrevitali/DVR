<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza</title>
</head>
<body>
    <table>
        <tr>
            <td>Id</td>
            <td>Id Operatore</td>
            <td>Data</td>
            <td>Peso Effettivo</td>
            <td>Altezza Iniziale</td>
            <td>Distanza Verticale</td>
            <td>Distanza Orizzontale</td>
            <td>Distanza Angolare</td>
            <td>Presa Carico</td>
            <td>Peso Massimo</td>
            <td>Indice Sollevamento</td>
            <td>Frequenza</td>
            <td>Prezzo</td>
        </tr>
        <?php
        session_start();
     $ip= '127.0.0.1';
     $username='root';
     $password='';
     $database='dvr';

     $connection=new mysqli($ip,$username,$password,$database);
     if ($connection->connect_error) {
         die('C\'è stato un errore: ' . $connection->connect_error);
     }
     $sql ='SELECT * FROM documento WHERE Id_Operatore="'.$_SESSION['Id'].'" AND Username="'.$_POST['userName'].'" ';
     $result =$connection->query($sql);
        ?>
    </table>
   
</body>
</html>