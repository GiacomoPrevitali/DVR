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
    <form id="form1" class=""  method="POST">
       
    <div class="container">   
        <div class="form-floating mb-3">
            <input id="Nome"        name="Nome"        placeholder="Ragione sociale"                                    class="form-control"    required><br>
            <label for="floatingInput">Ragione Sociale</label>  
        </div>
        <div class="form-floating mb-3">
            <input id="Prezzo"      name="Prezzo"      placeholder="Prezzo"                     type="number" min="0"   class="form-control"    required><br>
            <label for="floatingInput">Prezzo</label> 
        </div>
            <input id="Data"        name="Data"        placeholder="Data"                       type="date"                                     required><br>
        <div class="form-floating mb-3">
            <input id="pesoEff"     name="pesoEff"     placeholder="Peso Effettivo (Kg)"        type="number" min="3"  max="30"   class="form-control"    required><br>
            <label for="floatingInput">Peso Effettivo (Kg)</label>  
        </div>
        <select id="AltIn"     name="AltIn" required>
            <option value="" disabled selected>Altezza Iniziale (Cm)</option>
            <option value="0">0</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="75">75</option>
            <option value="100">100</option>
            <option value="125">125</option>
            <option value="150">150</option>
            <option value="175">175</option>
        </select><br>
        <select id="DistVert"     name="DistVert" required>
            <option value="" disabled selected>Distanza Verticale (Cm)</option>
            <option value="25">25</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
            <option value="70">70</option>
            <option value="100">100</option>
            <option value="150">150</option>
            <option value="175">175</option>
        </select><br>
        <select id="DistOrizz"     name="DistOrizz" required>
            <option value="" disabled selected>Distanza orizzontale (Cm)</option>
            <option value="25">25</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
            <option value="55">55</option>
            <option value="60">60</option>
            <option value="63">63</option>
        </select><br> 
        <select id="DistAngo"     name="DistAngo" required>
            <option value="" disabled selected>Distanza angolare</option>
            <option value="0">0</option>
            <option value="30">30</option>
            <option value="60">60</option>
            <option value="90">90</option>
            <option value="120">120</option>
            <option value="135">135</option>
            <option value="136">136</option>
        </select><br>
        <select id="PresaC"     name="PresaC" required>
            <option value="" disabled selected>Presa sul carico</option>
            <option value="1">Buona</option>
            <option value="0">Scarsa</option>
        </select><br>
        <!--<input id="PesoMax"     name="PesoMax"          placeholder="Peso massimo"          required><br>-->
        <select id="Freq"     name="Freq" required >
            <option value="" disabled selected>Frequenza</option>
            <option value="20">0,20 gesti/minuto</option>
            <option value="1">1 gesti/minuto</option>
            <option value="4">4 gesti/minuto</option>
            <option value="6">6 gesti/minuto</option>
            <option value="9">9 gesti/minuto</option>
            <option value="12">12 gesti/minuto</option>
            <option value="15">>15 gesti/minuto</option>
        </select><br>
        <select id="Durata"     name="PresaC" required>
            <option value="" disabled selected>Durata</option>
            <option value="1">< 1 ora</option>
            <option value="2"> da 1 a 2 ore</option>
            <option value="8"> da 2 a 8 ore</option>
        </select><br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="UnaMano">
            <label class="form-check-label" for="flexCheckDefault">
              Sollevamento con una sola mano
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="DuePersone">
            <label class="form-check-label" for="flexCheckDefault">
              Sollevamento in 2 persone
            </label>
          </div>
      <button id="sendNew" class="btn1" type="submit" >Crea nuovo DVR</button>
    </div>
    </form>
</div>
</div>
<script type='text/javascript' src='script.js'></script>
</body>
</html>