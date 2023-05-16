<?php
session_start();
if(isset($_SESSION['Nome'])){
   if(isset($_POST['Nome'])){
      $KpesoNIOSH=20;
      $AltezzaTerra=0;
      $FattorePresa=1;
      $DistanzaOrizzontale=0;
      $DistanzaVerticale=0;
      $DistanzaAngolare=0;
      $FrequenzaMinuto=0;
      //ALTEZZA DA TERRA
      switch($_REQUEST['AltIn']){
            case 0:
                  $AltezzaTerra=0.77;
                  break;
            case 25:
                  $AltezzaTerra=0.85;
                  break;
            case 50:
                  $AltezzaTerra=0.93;
                  break;
            case 75:
                  $AltezzaTerra=1;
                  break;
            case 100:
                  $AltezzaTerra=0.93;
                  break;
            case 125:
                  $AltezzaTerra=0.85;
                  break;
            case 150:
                  $AltezzaTerra=0.78;
                  break; 
            case 175:
                  $AltezzaTerra=0;
                  break;      
      }     
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
         }*/

       //DISTANZA VERTICALE
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

     //DISTANZA VERTICALE
     switch($_REQUEST['DistVert']){
            case 25:
                  $DistanzaOrizzontale=1;
                  break;
            case 30:
              $DistanzaOrizzontale=0.97;
              break;
            case 40:
                  $DistanzaOrizzontale=0.93;
                  break;
            case 50:
                  $DistanzaOrizzontale=0.91;
                  break;
            case 70:
                  $DistanzaOrizzontale=0.88;
                  break;
            case 100:
                  $DistanzaOrizzontale=0.87;
                  break;
            case 150:
                  $DistanzaOrizzontale=0.86;
                  break;
            case 175:
                  $DistanzaOrizzontale=0;
                  break;
     }
     //DISTANZA ORIZZONTALE
     switch($_REQUEST['DistOrizz']){
            case 25:
                  $DistanzaOrizzontale=1;
                  break;
            case 30:
                  $DistanzaOrizzontale=0.83;
                  break;
            case 40:
                  $DistanzaOrizzontale=0.63;
                  break;
            case 50:
                  $DistanzaOrizzontale=0.50;
                  break;
            case 55:
                  $DistanzaOrizzontale=0.45;
                  break;
            case 60:
                  $DistanzaOrizzontale=0.42;
                  break;
            case 63:
                  $DistanzaOrizzontale=0;
                  break;
      }


      //DISTANZA ANGOLARE
      switch($_REQUEST['DistAngo']){
            case 0:
                  $DistanzaAngolare=1;
                  break;
            case 30:
                  $DistanzaAngolare=0.9;
                  break;
            case 60:
                  $DistanzaAngolare=0.81;
                  break;
            case 90:
                  $DistanzaAngolare=0.71;
                  break;
            case 120:
                  $DistanzaAngolare=0.52;
                  break;
            case 135:
                  $DistanzaAngolare=0.57;
                  break;
            case 136:
                  $DistanzaAngolare=0;
                  break;
      }



     //GIUDIZIO SUL PESO
     switch($_REQUEST['Freq']){
      case "20":
            switch($_REQUEST['Durata']){
               case "1":
                     $FrequenzaMinuto=1;
                     break;
               case "2":
                     $FrequenzaMinuto=0.95;
                     break;
               case "8":
                     $FrequenzaMinuto=0.85;
                     break;
               }
            break;
      case "1":
            switch($_REQUEST['Durata']){
               case "1":
                     $FrequenzaMinuto=0.94;
                     break;
               case "2":
                     $FrequenzaMinuto=0.88;
                     break;
               case "8":
                     $FrequenzaMinuto=0.75;
                     break;
               }
            break;
      case "4":
            switch($_REQUEST['Durata']){
               case "1":
                     $FrequenzaMinuto=0.84;
                     break;
               case "2":
                     $FrequenzaMinuto=0.72;
                     break;
               case "8":
                     $FrequenzaMinuto=0.45;
                     break;
               }
            break;
      case "6":
            switch($_REQUEST['Durata']){
               case "1":
                     $FrequenzaMinuto=0.75;
                     break;
               case "2":
                     $FrequenzaMinuto=0.5;
                     break;
               case "8":
                     $FrequenzaMinuto=0.27;
                     break;
               }
            break;
      case "9":
            switch($_REQUEST['Durata']){
               case "1":
                     $FrequenzaMinuto=0.52;
                     break;
               case "2":
                     $FrequenzaMinuto=0.3;
                     break;
               case "8":
                     $FrequenzaMinuto=0.52;
                     break;
               }
            break;
      case "12":
            switch($_REQUEST['Durata']){
               case "1":
                     $FrequenzaMinuto=0.37;
                     break;
               case "2":
                     $FrequenzaMinuto=0.21;
                     break;
               case "8":
                     $FrequenzaMinuto=0;
                     break;
               }
            break;
      case "15":
            switch($_REQUEST['Durata']){
               case "1":
                     $FrequenzaMinuto=0;
                     break;
               case "2":
                     $FrequenzaMinuto=0;
                     break;
               case "8":
                     $FrequenzaMinuto=0;
                     break;
               }
            break;
   }
     switch($_REQUEST['PresaC']){
      case "1":
          $FattorePresa=1;
          break;
      case "0":
          $FattorePresa=0.90;
          break;
      }

      

      $DataVal=$_POST['DataVal'];
     
   
      $PesoRaccomandato=$KpesoNIOSH*$AltezzaTerra*$DistanzaOrizzontale* $DistanzaVerticale*$DistanzaAngolare*$FattorePresa*$FrequenzaMinuto;
      $valido="1";
      //if($PesoRaccomandato!=0){
        if($PesoRaccomandato!=0 ){
            $IndiceSollevamento=$_REQUEST['pesoEff']/$PesoRaccomandato;
            }else{
            $IndiceSollevamento=-1;
            $valido="0";
        }
        if($_REQUEST['pesoEff']>=30){
            $IndiceSollevamento=-1;
            $valido="0";
        }
       // $IndiceSollevamento=$pesoEff/$PesoRaccomandato;
     // }
        require_once('config.php');
       
         $sql='INSERT INTO documento (Id,Id_Operatore, Nome, DataU, PesoEffettivo, AltezzaIniziale, DistanzaVerticale, DistanzaOrizzontale, DistanzaAngolare, PresaCarico, PesoMax, IndiceSollevamento, FrequenzaGesti, Prezzo,Durata, Validità) VALUES (NULL,"'.$_SESSION['Id'].'", "'.$_REQUEST['Nome'].'", "'.$_REQUEST['DataVal'].'", "'.$_REQUEST['pesoEff'].'", "'.$_REQUEST['AltIn'].'", "'.$_REQUEST['DistVert'].'", "'.$_REQUEST['DistOrizz'].'", "'.$_REQUEST['DistAngo'].'", "'.$FattorePresa.'", "'. $PesoRaccomandato.'", "'.$IndiceSollevamento.'", "'.$_REQUEST['Freq'].'", "'.$_REQUEST['Prezzo'].'","'.$_REQUEST['Durata'].'","'.$valido.'")';
         $result =$connection->query($sql);

         if($_POST['Update']=="0"){
            $sql='UPDATE documento SET Validità = 0 WHERE Id = "'.$_REQUEST['Id'].'"';
            $result =$connection->query($sql);
         }
         echo json_encode(array('message' => $KpesoNIOSH, $AltezzaTerra, $DistanzaOrizzontale,$DistanzaVerticale, $DistanzaAngolare, $FattorePresa, $FrequenzaMinuto ));
   }
}else{
   header("Location: index.php?error");
}
?>