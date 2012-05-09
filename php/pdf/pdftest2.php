<?php

define('FPDF_FONTPATH', 'fpdf17/font/');
require('fpdf17/fpdf.php');

class PDF_E extends FPDF
{
	function Header()
	{
		global $title;
		$this->SetFont('times', 'B', 12);
		$this->Image('image.jpg', 5, 5, 25, 20);
		$w = $this->GetStringWidth($title) + 16;
		$this->SetX( (210-$w)/2 );		// calculate central point of the line
		$this->SetDrawColor(0, 80, 180);
		$this->SetFillColor(230, 230, 0);
		$this->SetTextColor(220, 50, 50);
		$this->SetLineWidth(1);
		$this->Cell($w, 9, $title, 1, 1, 'C', 1);
		$this->SetLineWidth(0.5);
		$this->SetDrawColor(0, 200, 200);
		$this->Line(10, 25, 200, 25);
		$this->Ln(10);
	}

	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('times', 'I', 8);
		$this->SetTextColor(128);
		$this->Cell(0,10, 'Page '.$this->PageNo(), 0, 0, 'C');
	}
	
	function BodyText($file)
	{
		$this->SetFillColor(200, 220, 255);
		$this->Cell(0, 6, "New File Title", 0, 0, 'L', 1);
		$this->Ln(10);
		$f = fopen($file, 'r');
		$txt = fread($f, filesize($file));
		fclose($f);
		$this->SetFont('Times', '', 10);
		$this->MultiCell(0, 5, $txt, 0, 'L');
		$this->Ln();
		$this->SetFont('', 'I');
		$this->Cell(0, 5, '(end of file)');
	}

	function giveme($file)
	{
		$this->open();
		$this->AddPage();
		$this->BodyText($file);
	}
}

$pdf = new PDF_E();
$title = "New Title";
$pdf->SetTitle($title);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetAuthor('Stanley');
$pdf->giveme('go.txt');
$pdf->Output();

?>
