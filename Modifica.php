<?php 
session_start();
if(!isset($_SESSION['Permesso'])){
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
    <link rel="stylesheet" href="style2.css" />

    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            
    <title>Nuovo</title>
</head>
    
<body>
    <nav class="navbar navbar bg-warning ">
        <a href="Home.php">
            <button  class="btn2 btn btn-outline-warning">Torna alla pagina principale  </button>
        </a>
    </nav>
    <div class="form-row">
    <div class="form-col">
    <form class="" method="POST" action="new.php">
       
    <div class="container">      
        <input id="Nome1" name="Nome"        placeholder="Ragione sociale"><br>
        <input id="Data" name="Data"        placeholder="Data" type="date"><br>
        <input id="pesoEff" name="pesoEff"     placeholder="Peso Effettivo (Kg)"><br>
        <input id="AltIn"name="AltIn"       placeholder="Altezza iniziale (Cm)"><br>
        <input id="DistVert"name="DistVert"    placeholder="Distanza verticale (Cm)"><br>
        <input id="DistOrizz" name="DistOrizz"   placeholder="Distanza orizzontale (Cm)"><br>
        <input id="DistAngo" name="DistAngo"    placeholder="Distanza angolare"><br>
        <select id="PresaC" name="PresaC">
            <option value="Buona">Buona</option>
            <option value="Sufficiente">Sufficiente</option>
            <option value="Scarsa">Scarsa</option>
        </select><br>
        <input id="PesoMax" name="PesoMax"     placeholder="Peso massimo"><br>
        <input id="IndiceSoll" name="IndiceSoll"  placeholder="Indice sollevamento"><br>
        <input id="Freq" name="Freq"        placeholder="Frequenza"><br>
        <input id="Prezzo" name="Prezzo"      placeholder="Prezzo">  <br>
        <input id="Durata" name="Durata"      placeholder="Durata"> 
        <button id="sendNew" class="btn1" >Crea nuovo DVR</button>
    </form>
    
    </div>
</div>
</div>
<script type='text/javascript' src='script.js'></script>
</body>
</html>