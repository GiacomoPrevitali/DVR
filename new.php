<?php
     session_start();
     if(isset($_SESSION['Nome'])){
     if (isset($_POST['Nome'])){
         $ip= '127.0.0.1';
         $username='root';
         $password='';
         $database='dvr';

         $connection=new mysqli($ip,$username,$password,$database);
         if ($connection->connect_error) {
             die('C\'è stato un errore: ' . $connection->connect_error);
         }
        $sql='INSERT INTO documento (Id, Id_Operatore, Nome, DataU, PesoEffettivo, AltezzaIniziale, DistanzaVerticale, DistanzaOrizzontale, DistanzaAngolare, PresaCarico, PesoMax, IndiceSollevamento, FrequenzaGesti, Prezzo) VALUES (NULL, "'.$_SESSION['Id'].'", "'.$_POST['Nome'].'", "'.$_POST['Data'].'", "'.$_POST['pesoEff'].'", "'.$_POST['AltIn'].'", "'.$_POST['DistVert'].'", "'.$_POST['DistOrizz'].'", "'.$_POST['DistAngo'].'", "'.$_POST['PresaC'].'", "'.$_POST['PesoMax'].'", "'.$_POST['IndiceSoll'].'", "'.$_POST['Freq'].'", "'.$_POST['Prezzo'].'")';
         $result =$connection->query($sql);
     }
    }else{
        header("Location: index.php");
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="Home.php">
   
    <input name="Nome"        placeholder="Nome"><br>
    <input name="Data"        placeholder="Data" type="date"><br>
    <input name="pesoEff"     placeholder="Peso Effettivo (Kg)"><br>
    <input name="AltIn"       placeholder="Altezza iniziale (Cm)"><br>
    <input name="DistVert"    placeholder="Distanza verticale (Cm)"><br>
    <input name="DistOrizz"   placeholder="Distanza orizzontale (Cm)"><br>
    <input name="DistAngo"    placeholder="Distanza angolare"><br>
    <input name="PresaC"      placeholder="Presa sul carico"><br>
    <input name="PesoMax"     placeholder="Peso massimo"><br>
    <input name="IndiceSoll"  placeholder="Indice sollevamento"><br>
    <input name="Freq"        placeholder="Frequenza"><br>
    <input name="Prezzo"      placeholder="Prezzo">  
    <button type="submit">REGISTRATI</button>
    <a href="Home.php">
    <input type="button" value="Torna alla pagina principale">  
    </a>
    </form>
   

</body>
</html>