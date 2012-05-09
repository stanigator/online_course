<?php

define('FPDF_FONTPATH', 'fpdf17/font/');
include('fpdf17/fpdf.php');

$pdf = new FPDF('P', 'cm', 'A4');
$pdf->AddPage();
$pdf->SetMargins(2.5, 2.5, 3);
$pdf->SetTitle('My PDF document');
$pdf->SetAuthor('Stanley');
$pdf->SetSubject('Creating a PDF file');
$pdf->SetFont('Times', 'BIU', 18);

$pdf->ln();
$pdf->Cell(0, 1, 'Using FPDF', 1, 1, 'C', 0);

$pdf->ln();
$pdf->SetFont('Helvetica', 'I', 14);
$text = "This is an exercise to create PDF documents with FPDF library";
$pdf->MultiCell(0, 0.5, $text, 1, 'J');
$text1 = "1. This is line number 1";
$pdf->SetXY(5, 8);
$pdf->Write(1, $text1);

$pdf->ln();
$pdf->SetFont('Times', 'BIU', 12);
$text2 = "2. This is text 2.";
$pdf->Write(1, $text2);

$pdf->SetFont('Helvetica', '', 14);
$text3 = "3. This is text 3.";
$pdf->Write(1, $text3);

$pdf->Output('testing2.pdf', 'I');

?>
