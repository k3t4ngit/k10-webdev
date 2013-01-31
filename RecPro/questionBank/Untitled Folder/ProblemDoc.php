<?php
require('fpdf.php');
class PDF extends FPDF
{
 public $chapter ='';
function Header()
{
global $title;
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Calculate width of title and position
    $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    // Colors of frame, background and text
    $this->SetDrawColor(255,255,255);
    $this->SetFillColor(255,255,255);
    $this->SetTextColor(0,0,0);
    // Thickness of frame (1 mm)
    $this->SetLineWidth(0);
    // Title
    $this->Cell($w,9,$title,1,1,'C',true);
    // Line break
    $this->Ln(10);
}

function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Text color in gray
    $this->SetTextColor(0);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function ChapterTitle($num, $label)
{
    // Arial 12
    $this->SetFont('Arial','',12);
    // Background color
    $this->SetFillColor(255,255,255);
    // Title
    $this->Cell(0,6,"$chapter $num : $label",0,1,'L',true);
    // Line break
    $this->Ln(4);
}
function ChapterBody($file)
{
    // Read text file
    $txt = file_get_contents($file);
    // Times 12
    $this->SetFont('Times','',12);
    // Output justified text
    $this->MultiCell(0,5,$txt);
    // Line break
    $this->Ln();
    // Mention in italics
    $this->SetFont('','I');
    //$this->Cell(0,5,'(end of excerpt)');
}
function PrintChapter($num, $title, $file)
{
    $this->AddPage();
    $this->ChapterTitle($num,$title);
    $this->ChapterBody($file);
}
}
$pdf = new PDF();
$title = 'Problem 1';
$pdf->Cell(28,5,$title,1, "C",0) ;
$pdf->PrintChapter('Problem',1,'file.php');
$pdf->Output("Document.pdf","D");
$pdf->Output();
?>
