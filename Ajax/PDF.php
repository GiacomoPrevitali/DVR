<?php
session_start();
//if(isset($_POST['Id'])){
    echo "ciaso";
    $Id=$_POST['Id'];
   // echo json_encode(array('message' => $Id));
require_once('config.php');
require('../fpdf/fpdf.php');

$sql ='SELECT * FROM documento WHERE Id="'.$Id.'"';
$result =$connection->query($sql);
/*//$json=array();
//$pdf = new FPDF();

//$pdf->AddPage();
//$pdf->SetFont('Arial', 'B', 16);
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
if($result->num_rows>0){
    while($row=mysqli_fetch_assoc($result)){
        
        $pdf->Cell(190, 40, "Ragione sociale: dsd", 1, 1, 'C');

        //array_push($json,$row);
    } 
}*/

$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(40,10,'Ciao, quest il tuo PDF!');
$pdf->Output();
//}
?>
