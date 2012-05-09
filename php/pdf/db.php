<?php

define('FPDF_FONTPATH', 'fpdf17/font/');
require('fpdf17/fpdf.php');
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 5, 'Id');

$pdf->SetX(35);
$pdf->Cell(40, 5, 'Name');

$pdf->SetX(80);
$pdf->Cell(60, 5, 'Email');

$pdf->SetX(160);
$pdf->Cell(60, 5, 'Password');

$pdf->SetLineWidth(0.5);
$pdf->SetDrawColor(0, 200, 200);
$pdf->Line(10, 17, 200, 17);
$pdf->Ln(10);

$data = mysql_connect('localhost', 'root', '') or die("Error connecting to database");
mysql_select_db('testsite');
$query = mysql_query('SELECT * FROM users ORDER BY id');

while($line = mysql_fetch_array($query))
{
	$pdf->Ln();
	$pdf->SetX(10);
	$pdf->Cell(40, 5, $line['id']);
	$pdf->SetX(35);
	$pdf->Cell(40, 5, $line['name']);
	$pdf->SetX(80);
	$pdf->Cell(40, 5, $line['email']);
	$pdf->SetX(160);
	$pdf->Cell(40, 5, $line['password']);
}
mysql_close($data);

$pdf->Output();



?>
