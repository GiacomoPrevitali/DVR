<?php
session_start();
ob_start();
require('../fpdf/fpdf.php');
require_once('config.php');
    $id = $_POST['Id'];
    //echo $_POST['Id'];
$sql ='SELECT * FROM documento WHERE Id ="'.$_POST['Id'].'"';
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
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
    $descrizioni = array(
        'Peso effettivo: '.$row['PesoEffettivo'].' Kg',
        'Altezza iniziale: '.$row['AltezzaIniziale'].' cm',
        'Distanza verticale: '.$row['DistanzaVerticale'].' cm',
        'Distanza orizzontale: '.$row['DistanzaOrizzontale'].' cm',
        'Dislocazione angolare: '.$row['DistanzaAngolare'],
        'Presa: '.$row['PresaCarico'],
        'Frequenza '.$row['FrequenzaGesti'].' (al minuto)',
        'Tempo: '.$row['Durata'].' (ore)',
        'Validità: '.$row['Validità'],
        'Peso raccomandato: '.$row['PesoMax'].' Kg',
        'Indice sollevamento: '.$row['IndiceSollevamento'],
        //'Esito: '.$row['esito'],
        'Prezzo: '.$row['Prezzo'].'€'
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
        $pdf->SetXY($x, $y);
        $pdf->SetFillColor(200, 230, 255);
        $pdf->MultiCell($col_width, $row_height, $descrizioni[$index], 1, 'C', true);
    }
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
$pdf->Cell(0, 10, "Indice di sollevamento: $row['IndiceSollevamento']", 1, 1, 'C', true);
if ($row['IndiceSollevamento'] <= 0.85) {
    $pdf->Cell(190, 20, "Situazione accettabile: non e' necessario nessun provvedimento", 1, 1, 'C', true);
} else if ($row['IndiceSollevamento'] <= 0.99) {
    $pdf->Cell(190, 20, "E' necessario attivare la sorveglianza sanitaria e la formazione e informazione del personale", 1, 1, 'C', true);
} else {
    $pdf->Cell(190, 20, "E' necessario attivare interventi di prevenzione, la sorveglianza sanitaria annuale", 1, 1, 'C', true);
    $pdf->Cell(190, 20, " e la formazione e informazione del personale", 1, 1, 'C', true);
}
        $pdf->Output();
        ob_end_flush();
}
?>