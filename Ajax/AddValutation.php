<?php
     session_start();
     //if(isset($_SESSION['Nome'])){
     //if (isset($_POST['Nome'])){
        $KpesoNIOSH=23;
        $AltezzaTerra=0;
        $DistanzaOrizzontale=0;
        $DistanzaVerticale=0;
        $DistanzaAngolare=0;
        $FrequenzaMinuto=0;
        $pesoEff=0;
        $FattorePresa=0;
     //$pesoEff=$_REQUEST['pesoEff'];
        
        $PesoRaccomandato=$KpesoNIOSH*$AltezzaTerra*$DistanzaOrizzontale* $DistanzaVerticale*$DistanzaAngolare*$FrequenzaMinuto*$FattorePresa;
        echo $PesoRaccomandato;
        echo
       // echo $_REQUEST['pesoEff'];
        
        //$IndiceSollevamento=$pesoEff/$PesoRaccomandato;

        require_once('config.php');
       
         $sql='INSERT INTO documento (Id,Id_Operatore, Nome, DataU, PesoEffettivo, AltezzaIniziale, DistanzaVerticale, DistanzaOrizzontale, DistanzaAngolare, PresaCarico, PesoMax, IndiceSollevamento, FrequenzaGesti, Prezzo,Durata) VALUES (NULL,"'.$_SESSION['Id'].'", "'.$_REQUEST['Nome'].'", "'.$_REQUEST['Data'].'", "'.$_REQUEST['pesoEff'].'", "'.$_REQUEST['AltIn'].'", "'.$_REQUEST['DistVert'].'", "'.$_REQUEST['DistOrizz'].'", "'.$_REQUEST['DistAngo'].'", "'.$_REQUEST['PresaC'].'", "'. $PesoRaccomandato.'", "'.$IndiceSollevamento.'", "'.$_REQUEST['Freq'].'", "'.$_REQUEST['Prezzo'].'","'.$_REQUEST['Durata'].'")';
         $result =$connection->query($sql);
     //}
   // }else{
        //header("Location: index.php?error");
   // }
    ?>