<?php
     session_start();
     if(isset($_SESSION['Nome'])){
     if (isset($_POST['Nome'])){
        
       $KpesoNIOSH=23;
       $AltezzaTerra=0;
       $DistanzaOrizzontale=0;
       $DistanzaVerticale=0;
       $DistanzaAngolare=0;
       $FrequenzaMinuto=0;

        //DISTANZA ORIZZONTALE
        if($_REQUEST['DistOrizz']>=0 AND $_REQUEST['DistOrizz']<25 ){
            $DistanzaOrizzontale=1;
        }else if($_REQUEST['DistOrizz']>=25 AND $_REQUEST['DistOrizz']<30){
            $DistanzaOrizzontale=0.83;
        }else if($_REQUEST['DistOrizz']>=30 AND $_REQUEST['DistOrizz']<40){
            $DistanzaOrizzontale=0.63;
        }else if($_REQUEST['DistOrizz']>=40 AND $_REQUEST['DistOrizz']<50){
            $DistanzaOrizzontale=0.50;
        }else if($_REQUEST['DistOrizz']>=50 AND $_REQUEST['DistOrizz']<55 ){
            $DistanzaOrizzontale=0.45;
        }else if($_REQUEST['DistOrizz']>=55 AND $_REQUEST['DistOrizz']<60){
            $DistanzaOrizzontale=0.42;
        }else if($_REQUEST['DistOrizz']>=60){
            $DistanzaOrizzontale=0;
        }
        
        //ALTEZZA TERRA
        if($_REQUEST['AltIn']>=0 AND $_REQUEST['AltIn']<25){
            $AltezzaTerra=0.77;
        }else if($_REQUEST['AltIn']>=25 AND $_REQUEST['AltIn']<50){
            $AltezzaTerra=0.85;
        }else if($_REQUEST['AltIn']>=50 AND $_REQUEST['AltIn']<75){
            $AltezzaTerra=0.93;
        }else if($_REQUEST['AltIn']>=75 AND $_REQUEST['AltIn']<100){
            $AltezzaTerra=1;
        }else if($_REQUEST['AltIn']>=100 AND $_REQUEST['AltIn']<125){
            $AltezzaTerra=0.93;
        }else if($_REQUEST['AltIn']>=125 AND $_REQUEST['AltIn']<150){
            $AltezzaTerra=0.85;
        }else if($_REQUEST['AltIn']>=150 AND $_REQUEST['AltIn']<175){
            $AltezzaTerra=0.77;
        }else if($_REQUEST['AltIn']>=175){
            $AltezzaTerra=0;
        }

        // DISTANZA VERTICALE
        if($_REQUEST['DistVert']>=0 AND $_REQUEST['DistVert']<25 ){
            $DistanzaVerticale=1;
        }else if($_REQUEST['DistVert']>=25 AND $_REQUEST['DistVert']<30){
            $DistanzaVerticale=0.97;
        }else if($_REQUEST['DistVert']>=30 AND $_REQUEST['DistVert']<40){
            $DistanzaVerticale=0.93;
        }else if($_REQUEST['DistVert']>=40 AND $_REQUEST['DistVert']<50){
            $DistanzaVerticale=0.91;
        }else if($_REQUEST['DistVert']>=50 AND $_REQUEST['DistVert']<70 ){
            $DistanzaVerticale=0.88;
        }else if($_REQUEST['DistVert']>=70 AND $_REQUEST['DistVert']<100){
            $DistanzaVerticale=0.87;
        }else if($_REQUEST['DistVert']>=100 AND $_REQUEST['DistVert']<150){
            $DistanzaVerticale=0.86;
        }else if($_REQUEST['DistVert']>=175){
            $DistanzaVerticale=0;
        }

        //DISTANZA ANGOLARE
        if($_REQUEST['DistAngo']>=0 AND $_REQUEST['DistAngo']<30 ){
            $DistanzaAngolare=1;
        }else if($_REQUEST['DistAngo']>=30 AND $_REQUEST['DistAngo']<60){
            $DistanzaAngolare=0.9;
        }else if($_REQUEST['DistAngo']>=60 AND $_REQUEST['DistAngo']<90){
            $DistanzaAngolare=0.81;
        }else if($_REQUEST['DistAngo']>=90 AND $_REQUEST['DistAngo']<120){
            $DistanzaAngolare=0.71;
        }else if($_REQUEST['DistAngo']>=120 AND $_REQUEST['DistAngo']<135 ){
            $DistanzaAngolare=0.52;
        }else if($_REQUEST['DistAngo']==135){
            $DistanzaAngolare=0.57;
        }else if($_REQUEST['DistAngo']>135){
            $DistanzaAngolare=0;
        }
            echo $_REQUEST['Nome'];
        //FATTORE PRESA
        switch($_REQUEST['PresaC']){
            case "Buona":
                $FattorePresa=1;
                break;
            case "Sufficente":
                $FattorePresa=0.95;
                break;
            case "Scarsa":
                $FattorePresa=0.90;
                break;
        }


        //FREQUENZA
        ///---------------------Sistemare frequenza in base a numero di ore-----------------
        if($_REQUEST['Freq']>=0 AND $_REQUEST['Freq']<0.20 ){
            $FrequenzaMinuto=1;
        }else if($_REQUEST['Freq']>=0.20 AND $_REQUEST['Freq']<1){
            $FrequenzaMinuto=0.94;
        }else if($_REQUEST['Freq']>=1 AND $_REQUEST['Freq']<4){
            $FrequenzaMinuto=0.84;
        }else if($_REQUEST['Freq']>=4 AND $_REQUEST['Freq']<6){
            $FrequenzaMinuto=0.75;
        }else if($_REQUEST['Freq']>=6 AND $_REQUEST['Freq']<9 ){
            $FrequenzaMinuto=0.52;
        }else if($_REQUEST['Freq']>=9 AND $_REQUEST['Freq']<15 ){
            $FrequenzaMinuto=0.37;
        }else if($_REQUEST['Freq']>15){
            $FrequenzaMinuto=0;
        }
        
    
        $PesoRaccomandato=$KpesoNIOSH*$AltezzaTerra*$DistanzaOrizzontale* $DistanzaVerticale*$DistanzaAngolare*$FrequenzaMinuto*$FattorePresa;
        echo $PesoRaccomandato;
        echo $_REQUEST['pesoEff'];
        
        $IndiceSollevamento=$_REQUEST['pesoEff']/$PesoRaccomandato;

         $ip= '127.0.0.1';
         $username='root';
         $password='';
         $database='dvr';

         $connection=new mysqli($ip,$username,$password,$database);
         if ($connection->connect_error) {
             die('C\'è stato un errore: ' . $connection->connect_error);
         }
       
         $sql='INSERT INTO documento (Id,Id_Operatore, Nome, DataU, PesoEffettivo, AltezzaIniziale, DistanzaVerticale, DistanzaOrizzontale, DistanzaAngolare, PresaCarico, PesoMax, IndiceSollevamento, FrequenzaGesti, Prezzo,Durata) VALUES (NULL,"'.$_SESSION['Id'].'", "'.$_POST['Nome'].'", "'.$_POST['Data'].'", "'.$_POST['pesoEff'].'", "'.$_POST['AltIn'].'", "'.$_POST['DistVert'].'", "'.$_POST['DistOrizz'].'", "'.$_POST['DistAngo'].'", "'.$_POST['PresaC'].'", "'. $PesoRaccomandato.'", "'.$IndiceSollevamento.'", "'.$_POST['Freq'].'", "'.$_POST['Prezzo'].'","'.$_POST['Durata'].'")';
         $result =$connection->query($sql);
     }
    }else{
        header("Location: index.php?error");
    }
    ?>