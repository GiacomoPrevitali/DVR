<?php
     session_start();
     if(isset($_SESSION['Nome'])){
     if (isset($_POST['Nome'])){
        
       $KpesoNIOSH=23;

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="style.css" />

    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            
    <title>Nuovo</title>
</head>
<body>
    
<body>
    <div class="wrapper">

        <form class="p-3 mt-3" method="POST" action="index.php">
            <div class="form-field d-flex align-items-center">
                <input name="Nome"        placeholder="Ragione sociale"><br>
            </div>
            <div class="form-field d-flex align-items-center">
            <input name="Data"        placeholder="Data" type="date"><br>
            </div>
            <div class="form-field d-flex align-items-center">
            <input name="pesoEff"     placeholder="Peso Effettivo (Kg)"><br>
            </div>
            <div class="form-field d-flex align-items-center">
            <input name="AltIn"       placeholder="Altezza iniziale (Cm)"><br>
            </div>
            <div class="form-field d-flex align-items-center">
            <input name="Data"        placeholder="Data" type="date"><br>
            </div>
            <div class="form-field d-flex align-items-center">
            <input name="Data"        placeholder="Data" type="date"><br>
            </div>
            <div class="form-field d-flex align-items-center">
            <input name="Data"        placeholder="Data" type="date"><br>
            </div>
            <div class="form-field d-flex align-items-center">
            <input name="Data"        placeholder="Data" type="date"><br>
            </div>
            <div class="form-field d-flex align-items-center">
            <input name="Data"        placeholder="Data" type="date"><br>
            </div>
            <div class="form-field d-flex align-items-center">
            <input name="Data"        placeholder="Data" type="date"><br>
            </div>
            <div class="form-field d-flex align-items-center">
            <input name="Data"        placeholder="Data" type="date"><br>
            </div>
            <div class="form-field d-flex align-items-center">
            <input name="Data"        placeholder="Data" type="date"><br>
            </div>

        </form>
        <div class="text-center fs-6">
            <!--<a href="#">Forget password?</a> or <a href="#">Sign up</a>-->
        </div>
   

   
    <input name="Nome"        placeholder="Ragione sociale"><br>
    <input name="Data"        placeholder="Data" type="date"><br>
    <input name="pesoEff"     placeholder="Peso Effettivo (Kg)"><br>
    <input name="AltIn"       placeholder="Altezza iniziale (Cm)"><br>
    <input name="DistVert"    placeholder="Distanza verticale (Cm)"><br>
    <input name="DistOrizz"   placeholder="Distanza orizzontale (Cm)"><br>
    <input name="DistAngo"    placeholder="Distanza angolare"><br>
    <input name="PresaC"      placeholder="Presa sul carico (Buona/sufficn/scarsa"><br>
    <input name="PesoMax"     placeholder="Peso massimo"><br>
    <!--<input name="IndiceSoll"  placeholder="Indice sollevamento"><br>-->
    <input name="Freq"        placeholder="Frequenza"><br>
    <input name="Prezzo"      placeholder="Prezzo">  
    <input name="Durata"      placeholder="Durata">  
    <button type="submit">REGISTRATI</button>
    <a href="Home.php">
    <input type="button" value="Torna alla pagina principale">  
    </a>
    </form>
</body>
</html>