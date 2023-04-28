<?php
session_start();
if(isset($_SESSION['Nome'])){
   if(isset($_POST['Nome'])){
      
      $DataVal=$_POST['DataVal'];
      echo json_encode(array('message' => $DataVal));
   
      /*$KpesoNIOSH=23;
      $AltezzaTerra=0;
      $DistanzaOrizzontale=0;
      $DistanzaVerticale=0;
      $DistanzaAngolare=0;
      $FrequenzaMinuto=0;*/

        //$PesoRaccomandato=$KpesoNIOSH*$AltezzaTerra*$DistanzaOrizzontale* $DistanzaVerticale*$DistanzaAngolare*$FrequenzaMinuto*$FattorePresa;
        //echo $PesoRaccomandato;
        $PesoRaccomandato=1;
       // echo $_REQUEST['pesoEff'];
    //-----------------------Fare if per presaCarico----------------------------------------------------
       // $IndiceSollevamento=$pesoEff/$PesoRaccomandato;
       $IndiceSollevamento=$_REQUEST['pesoEff']/$PesoRaccomandato;
        require_once('config.php');
       $sql='UPDATE documento SET Validità = 0 WHERE Id = "'.$_REQUEST['Id'].'"';
        $result =$connection->query($sql);
        $sql='INSERT INTO documento (Id,Id_Operatore, Nome, DataU, PesoEffettivo, AltezzaIniziale, DistanzaVerticale, DistanzaOrizzontale, DistanzaAngolare, PresaCarico, PesoMax, IndiceSollevamento, FrequenzaGesti, Prezzo,Durata, Validità) VALUES (NULL,"'.$_SESSION['Id'].'", "'.$_REQUEST['Nome'].'", "'.$_REQUEST['DataVal'].'", "'.$_REQUEST['pesoEff'].'", "'.$_REQUEST['AltIn'].'", "'.$_REQUEST['DistVert'].'", "'.$_REQUEST['DistOrizz'].'", "'.$_REQUEST['DistAngo'].'", "'.$_REQUEST['PresaC'].'", "'. $PesoRaccomandato.'", "'.$IndiceSollevamento.'", "'.$_REQUEST['Freq'].'", "'.$_REQUEST['Prezzo'].'","'.$_REQUEST['Durata'].'",1)';
         $result =$connection->query($sql);
     //}
   // }else{
        //header("Location: index.php?error");
   // }
}
}else{
   header("Location: index.php?error");
}
?>