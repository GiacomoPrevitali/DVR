
<?php
session_start();
ob_start();
require('./fpdf/fpdf.php');
require_once('./Ajax/config.php');
if(isset($_GET['Id'])){
    $id = $_GET['Id'];
    //echo $_POST['Id'];
$sql ='SELECT * FROM documento WHERE Id ="'.$_GET['Id'].'"';
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
//if($row['Validità']==1){
$pdf = new FPDF();
$pdf->SetTitle('PDF');
$pdf->SetAuthor('Creator');
$pdf->AddPage();
$pdf->SetFont('Arial','B',22);
$pdf->Cell(0, 20, 'Movimentazione manuale dei carichi', 0, 1, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(40,10,'ID valutazione:',0,0);
$pdf->Cell(40,10,$row['Id'],0,0);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(40,10,'Ragione sociale:',0,0);
$pdf->Cell(40,10,$row['Nome'],0,0);
$pdf->Ln();
$pdf->Cell(40,10,'Data:',0,0);
$pdf->Cell(40,10,$row['DataU'],0,0);
    $pdf->Ln(15);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Dettagli valutazione:', 0, 1, 'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12,);
    if($row['PresaCarico']==0){
        $presa="Scarsa";
    }else{
        $presa="Buona";
    }
    if($row['FrequenzaGesti']==20){
        $frequenza="0,20";
    }else{
        $frequenza=$row['FrequenzaGesti'];
    }
    if($row['Durata']==1){
        $durata="<1 ora";
    }else if($row['Durata']==2){
        $durata="1-2 ore";
    }else{
        $durata="2-8 ore";
    }
    if ($row['IndiceSollevamento'] <= 0.85) {
        $pdf->SetFillColor(0, 204, 1);
    } else if ($row['IndiceSollevamento'] <= 0.99) {
        $pdf->SetFillColor(255, 153, 0);
    } else {
        $pdf->SetFillColor(204, 51, 0); 
    }
    if ($row['PesoMax'] < 0) {
        $pdf->Cell(190, 20, "Situazione non accettabile: bisogna riprogettare la postazione lavorativa e le attività di lavoro", 1, 1, 'C', true);
    }
    //$pdf->Cell(0, 10, "Indice di sollevamento: $row['IndiceSollevamento']", 1, 1, 'C', true);
    if ($row['IndiceSollevamento'] <= 0.85) {
        $pdf->Cell(190, 20, "Non e' necessario nessun provvedimento", 1, 1, 'C', true);
    } else if ($row['IndiceSollevamento'] <= 0.99) {
        $pdf->Cell(190, 20, "Sorveglianza sanitaria e  formazione e informazione del personale necessarie", 1, 1, 'C', true);
    } else {
        $pdf->SetFont('Arial','B',10,);
        $pdf->Cell(190, 20, "Interventi di prevenzione,  sorveglianza sanitaria annuale e formazione e informazione del personale necessarie", 1, 1, 'C', true);
    }
    
    $descrizioni = array(
        'Peso effettivo: '.$row['PesoEffettivo'].' Kg',
        'Altezza iniziale: '.$row['AltezzaIniziale'].' cm',
        'Distanza verticale: '.$row['DistanzaVerticale'].' cm',
        'Distanza orizzontale: '.$row['DistanzaOrizzontale'].' cm',
        'Dislocazione angolare: '.$row['DistanzaAngolare'],
        'Presa: '.$presa,
        'Frequenza '.$frequenza.' (al minuto)',
        'Durata: '.$durata.'',
        //'Validita: '.$row['Validità'],
        'Peso raccomandato: '.$row['PesoMax'].' Kg',
        'Indice sollevamento: '.$row['IndiceSollevamento'],
        //'Esito: '.$row['esito'],
        'Prezzo: '.$row['Prezzo'].' Euro'
    );
$max_rows = 8;
$col_width = $pdf->GetPageWidth() / 2 - 5;
$row_height = 10;
for ($row = 0; $row < $max_rows; $row++) {
    for ($col = 0; $col < 2; $col++) {
        $index = $row * 2 + $col;
        if ($index >= count($descrizioni)) {
            break;
        }
        $x = $col * $col_width + 5;
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->MultiCell($col_width+90, $row_height, $descrizioni[$index], 1, 'C', true);
    }
}






        $pdf->Output();
        ob_end_flush();
}else{
    echo '<div class="alert alert-danger" role="alert" id="alert1" hidden>
            Non puoi stampare una valutazione non valida
          </div>';
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="npm i bootstrap@5.3.0-alpha3" real="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style3.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">



    <title>Visualizza</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type='text/javascript' src='script.js'></script>
</head>
<body onload=VerUtente("<?php echo $_SESSION['Permesso']; ?>");>
    

    <!--<button type="button" class=" btn btn-outline-success BtnAccount" data-bs-toggle="modal" data-bs-target="#exampleModal">Account</button>-->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <form id="ModificaDati" method="POST">
                        <div class="form-floating mb-3">
                          <input id="Nome1"        name="Nome"        placeholder="Ragione sociale"                                    class="form-control"    required><br>
                          <label for="floatingInput">Ragione Sociale</label>  
                      </div>
                      <div class="form-floating mb-3">
                          <input id="Prezzo1"      name="Prezzo"      placeholder="Prezzo"                     type="number" min="0"   class="form-control"    required><br>
                          <label for="floatingInput">Prezzo</label> 
                      </div>
                          <input id="Data1"        name="Data"        placeholder="Data"                       type="date"                                     required><br>
                      <div class="form-floating mb-3">
                          <input id="pesoEff1"     name="pesoEff"     placeholder="Peso Effettivo (Kg)"        type="number" min="3" max="30"   class="form-control"    required><br>
                          <label for="floatingInput">Peso Effettivo (Kg)</label>  
                      </div>
                      <div class="form-floating">
                      <select  class="form-select"  id="AltIn1"     name="AltIn" required>
                        <option value="" disabled selected>Altezza Iniziale (Cm)</option>
                        <option value="0">0</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                        <option value="125">125</option>
                        <option value="150">150</option>
                        <option value="175">175</option>
                    </select>
                    <label for="floatingSelect">Altezza Iniziale (Cm)</label><br>
                    </div>
                    <div class="form-floating">
                    <select class="form-select" id="DistVert1"     name="DistVert" required>
                        <option value="" disabled selected>Distanza Verticale (Cm)</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                        <option value="70">70</option>
                        <option value="100">100</option>
                        <option value="150">150</option>
                        <option value="175">175</option>
                    </select><label for="floatingSelect">Distanza Verticale (Cm)</label><br><br>
                    </div>
                    <div class="form-floating">
                    <select class="form-select" id="DistOrizz1"     name="DistOrizz" required>
                        <option value="" disabled selected>Distanza orizzontale (Cm)</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                        <option value="55">55</option>
                        <option value="60">60</option>
                        <option value="63">63</option>
                    </select><label for="floatingSelect">Distanza orizzontale (Cm</label><br><br>
                    </div>
                    <div class="form-floating"> 
                    <select  class="form-select" id="DistAngo1"     name="DistAngo" required>
                        <option value="" disabled selected>Distanza angolare</option>
                        <option value="0">0</option>
                        <option value="30">30</option>
                        <option value="60">60</option>
                        <option value="90">90</option>
                        <option value="120">120</option>
                        <option value="135">135</option>
                        <option value="136">136</option>
                    </select><label for="floatingSelect">Distanza Angolare </label><br><br>
                    </div>
                    <div class="form-floating">
                      <select  class="form-select" id="PresaC1"     name="PresaC" required>
                          <option value="" disabled selected>Presa sul carico</option>
                          <option value="1">Buona</option>
                          <option value="0">Scarsa</option>
                      </select><label for="floatingSelect">Presa sul carico</label><br><br>
                      </div>
                      <div class="form-floating">
                      <select class="form-select" id="Freq1"     name="Freq" required >
                          <option value="" disabled selected>Frequenza</option>
                          <option value="20">0,20 gesti/minuto</option>
                          <option value="1">1 gesti/minuto</option>
                          <option value="4">4 gesti/minuto</option>
                          <option value="6">6 gesti/minuto</option>
                          <option value="9">9 gesti/minuto</option>
                          <option value="12">12 gesti/minuto</option>
                          <option value="15">>15 gesti/minuto</option>
                      </select><label for="floatingSelect">Frequenza</label><br><br>
                      </div>
                      <div class="form-floating">
                      <select  class="form-select" id="Durata1"     name="PresaC" required>
                          <option value="" disabled selected>Durata</option>
                          <option value="1">< 1 ora</option>
                          <option value="2"> da 1 a 2 ore</option>
                          <option value="8"> da 2 a 8 ore</option>
                      </select><label for="floatingSelect">Durata</label><br><br>
                    </div>
                      <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="UnaMano1">
                            <label class="form-check-label" for="flexCheckDefault">
                              Sollevamento con una sola mano
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="DuePersone1">
                            <label class="form-check-label" for="flexCheckDefault">
                              Sollevamento in 2 persone
                            </label>
                      </div>
                      <div class="modal-footer">
                        <button id="ButtUpdate" type="submit" class="btn btn-success" data-bs-dismiss="modal">Salva</button>
                    </div> 
                    </form>
                </div>
                </div>
               
            </div>
        </div>
    </div>


    <div class="modal fade" id="ConfDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Conferma</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                
              </button>
            </div>
            <div class="modal-body">
              <p>Sei sicuro di voler cancellare il seguente documento?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Close()">Close</button>
              <button type="button" class="btn btn-danger"onclick=" Conf()">Conferma</button>
            </div>
          </div>
        </div>
      </div>

   
    <a href="Home.php">
    <input type="button"class="btn btn-outline-primary" id="view"  value="Torna alla pagina principale"> 
    </a>
    <div class="input-group searchBarGroup">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="RSWord" />
        <button type="button" class="btn btn-outline-primary" id="Startsearch">search</button>
    </div>
    <br>
    <div id="table-container"></div>
    <br>
    <table id="table" >
        <thead>
            <tr class="TitleTable bg-primary">
                <th class="thID">Id </th>
                <th class="thNA">Ragione Sociale</th>
                <th class="thDA">Data</th>
                <!--<th>Peso Effettivo (Kg)</th>-->
                <!--<th>Altezza Iniziale (Cm)</th>-->
              <!--  <th class="thDV">Distanza Verticale (Cm)</th>
                <th class="thDO">Distanza Orizzontale (Cm)</th>
                <th class="thAN">Distanza Angolare(°)</th>-->
                <!--<th>Fattore Presa</th>-->
                <th>Peso Limite (Kg)</th>
                <th class="thIS">Indice Sollevamento</th>
               <!-- <th>Frequenza al minuto</th>-->
                <th>Prezzo</th>
                <th>Validità</th>
                <th> PDF</th>
                <th>Modifica</th>
                <th>Elimina</th>                           
            </tr>
        </thead>
      </table>
<br>
<div class="alert alert-info" role="alert" id="NoVal" hidden>
    Non sono presenti valutazioni
  </div>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

