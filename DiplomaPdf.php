<?php
require('fpdf.php');

class DiplomaPdf extends FPDF{

public function __construct($post,$unit,$type)
{
parent::__construct($post,$unit,$type);
$this->AddPage();
$this->SetFont('Arial','B',16);
$this->Image('DiplomaFirna_Duran_1907.jpg',0,0,280);


}


public function renderFirma($firma, $x , $y ,$res='')
{
  $this->Image($firma,$x,$y,$res);
}

public function nombreCurso($nombre)
{
 
 	$this->SetFont('Arial','',35);
	$this->Ln(70);
    $this->Cell(0,10, $nombre, 0, 1, 'C');
}


}

?>
