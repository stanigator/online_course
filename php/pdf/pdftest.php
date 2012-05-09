<?php

define('FPDF_FONTPATH', 'fpdf17/font/');
include('fpdf17/fpdf.php');

$pdf = new FPDF('P', 'cm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(10, 0, 'TEST - Creating a pdf file!');
$pdf->Output();
$pdf->Output('testing.pdf');


?>
