<?php
require_once 'DiplomaPdf.php';
//require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
//require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

/*$rut = $_GET['rut'];
$query=mysqli_query($con,"SELECT * from diploma where rut = $rut");
	while($row=mysqli_fetch_array($query)){
			$nombre =$row['nombre'];
			$nombre.= " ".$row['apellido1'];
			$nombre.= " ".$row['apellido2'];
			}*/
$nombre = "Edwin Guasman Caceres";	
$nombre_diploma = "curso de nuebvoas";
$diplomaPdf = new DiplomaPdf('L','mm','letter');
$diplomaPdf->SetAutoPageBreak(false);
//$diplomaPdf->renderFirma('Firma_Liendo_0711.png',210,163,50);
$diplomaPdf->renderFirma('Firma_Olga.png',220,150,20);
$diplomaPdf->nombreCurso($nombre);
$diplomaPdf->footer();
$diplomaPdf->Output();
?>