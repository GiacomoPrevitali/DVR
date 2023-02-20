<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type='text/javascript' src='script.js'></script>
    <title>Home</title>
</head>
<body>
    
    <input id="pesoEff"     placeholder="Peso Effettivo (Kg)"><br>
    <input id="AltIn"       placeholder="Altezza iniziale (Cm)"><br>
    <input Id="DistVert"    placeholder="Distanza verticale (Cm)"><br>
    <input Id="DistOrizz"   placeholder="Distanza orizzontale (Cm)"><br>
    <input Id="DistAngo"    placeholder="Distanza angolare"><br>
    <input Id="PresaC"      placeholder="Presa sul carico"><br>
    <input Id="Freq"        placeholder="Frequenza (volte al minuto)"><br>
    <input Id="Dur"         placeholder="Durata (Ore)">  
    <button onclick="calcola()">Calcola</button>

    <?php
    session_start();
    echo "Ciao, ". $_SESSION['Nome']." ".$_SESSION['Cognome'];
    ?>
</body>
</html>