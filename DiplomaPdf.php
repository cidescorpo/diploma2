<?php
require('fpdf.php');

class DiplomaPdf extends FPDF{

public function __construct($post,$unit,$type)
{
parent::__construct($post,$unit,$type);
$this->AddPage();
$this->SetFont('Arial','B',16);
$this->Image('Diploma_Tipo_1901.jpg',0,0,280);


}


public function renderFirma($firma, $x , $y ,$res='')
{
  $this->Image($firma,$x,$y,$res);
}

public function nombreCurso($nombre,$nombrediploma1,$nombrediploma2,$lugarfecha,$horas)
{

	
    $nombre_diploma = "nombre diploma 1";
	$nombre_diploma2 = "nombre diploma 2";
 	$this->SetFont('Arial','',35);
	$this->Ln(70);
    $this->Cell(0,10, $nombre, 0, 1, 'C');
	
	
	$this->SetFont('Arial','',30);
	
	$this->Ln(22);
    $this->Cell(0,10,$nombrediploma1,0,1,'C');
	$this->Ln(2);
    $this->Cell(0,10,$nombrediploma2,0,1,'C');
	
	
	$this->SetFont('Arial','',15);
	$this->Ln(3);
	$this->Cell(0,5,$lugarfecha,0,1,'C');

	$this->SetFont('Arial','',15);
	$this->Ln(3);
    $this->Cell(0,5,$horas,0,1,'C');
	$this->SetFont('Arial','',14);
	
	
	
}
public function footer2($nombrerelator)
{    
	
	$this->SetFont('Arial','',15);
	 $this->SetY(-23);
    $this->Cell(195,5,' ',0,0,'C');
    $this->Cell(60,10,$nombrerelator,0,1,'C');

}

}

?>
