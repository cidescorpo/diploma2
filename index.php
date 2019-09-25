<?php
require_once 'DiplomaPdf.php';
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

$rut = $_GET['rut'];
$curso = $_GET['curso'];

$nombre = "";
$query=mysqli_query($con,"SELECT * from diploma where rut = '$rut'");
	while($row=mysqli_fetch_array($query)){
			$nombre =trim($row['nombre']);
			$nombre.= " ".trim($row['apellido1']);
			$nombre.= " ".trim($row['apellido2']);
			}

if(empty($nombre))
{   $link = 
	header("Location: ../diplomas.php?error=1&curso=".$curso );
}

if ($curso == 3829)
{
$nombrediploma1 = "Gestion de Activos F�sicos";
$nombrediploma2 = "Acorde a ISO 55000";

$lugarfecha = "Santiago, 8 y 9 de julio de 2019";

$horas = "16 horas";
$nombrerelator = "Jos� Dur�n"; 
$firmarelator = "Firma_Duran.png";
}
else if ($curso == 3797)
{
$nombrediploma1 = "Legislaci�n Laboral Actualizada:";
$nombrediploma2 = "Relaciones Individuales del Trabajo";

$lugarfecha = "Santiago, 9 y 10 de julio de 2019";

$horas = "15 horas";
$nombrerelator = "Ricardo Liendo";
$firmarelator = "Firma_Liendo_0711.png";

} 	

else if ($curso == 3780)
{
$nombrediploma1 = "Planificaci�n y Programaci�n";
$nombrediploma2 = "del Mantenimiento";

$lugarfecha = "Santiago, 10 y 11 de julio de 2019";

$horas = "15 horas";
$nombrerelator = "Johanna L�pez-Dur�n";
$firmarelator = "Firma_Johanna.png";

}
else if ($curso == 3781)
{
$nombrediploma1 = "Tribolog�a: Ingenier�a del";
$nombrediploma2 = "Desgaste";

$lugarfecha = "Santiago, 18 y 19 de julio de 2019";

$horas = "15 horas";
$nombrerelator = "Maurizio Edwards";
$firmarelator = "Firma_Edwards.png";

}
else if ($curso == 3816)
{
$nombrediploma1 = "Atenci�n/Servicio al Cliente y";
$nombrediploma2 = "Comunicaci�n";

$lugarfecha = "Santiago, 18 y 19 de julio de 2019";

$horas = "8 horas";
$nombrerelator = "Cristi�n Ruiz";
$firmarelator = "Firma_Ruiz.png";

}

else if ($curso == 3771)
{
$nombrediploma1 = "T�cnicas Exitosas de Licitaci�n y";
$nombrediploma2 = "Selecci�n del Mejor Contratista";

$lugarfecha = "Santiago, 22 y 23 de julio de 2019";

$horas = "16 horas";
$nombrerelator = "Dan Church";
$firmarelator = "Firma_DanChurch.png";

}
else if ($curso == 3772)
{
$nombrediploma1 = "Administraci�n y Ejecuci�n de";
$nombrediploma2 = "Contratos";

$lugarfecha = "Santiago, 24 y 25 de julio de 2019";

$horas = "15 horas";
$nombrerelator = "Dan Church";
$firmarelator = "Firma_DanChurch.png";

}
else if ($curso == 3802)
{
$nombrediploma1 = "Aseguramiento y Control de la Calidad";
$nombrediploma2 = "en la Exploraci�n Geol�gica y Minera";

$lugarfecha = "Santiago, 5 y 6 de agosto de 2019";

$horas = "16 horas";
$nombrerelator = "Armando Sim�n";
$firmarelator = "Firma_ArmandoSimon.png";

}

else if ($curso == 3804)
{
$nombrediploma1 = "Indicadores Claves de Desempe�o en Mantenimiento:";
$nombrediploma2 = "Implementaci�n y Monitoreo";

$lugarfecha = "Santiago, 6 y 7 de agosto de 2019";

$horas = "15 horas";
$nombrerelator = "Johanna L�pez-Dur�n";
$firmarelator = "Firma_Johanna.png";

}

else if ($curso ==  3880)
{
$nombrediploma1 = "Administraci�n de Fallas";
$nombrediploma2 = "de Alto Impacto";

$lugarfecha = "Santiago, 6, 7 y 8 de agosto de 2019";

$horas = "24 horas";
$nombrerelator = "Miguel Libbrecht";
$firmarelator = "Firma_Libbrecht.png";

}

else if ($curso ==  3855)
{
$nombrediploma1 = "Principios B�sicos de Seguridad El�ctrica en";
$nombrediploma2 = "Lugares de Trabajo: Aplicaci�n de NFPA 70E";

$lugarfecha = "Mejillones, 6 y 7 de agosto de 2019";

$horas = "15 horas";
$nombrerelator = "Juan Ram�n Flores";
$firmarelator = "Firma_Flores.png";

}
else if ($curso ==  3805)
{
$nombrediploma1 = "An�lisis de Causa Ra�z acorde";
$nombrediploma2 = "a Normas Internacionales";

$lugarfecha = "Santiago, 8 y 9 de agosto de 2019";

$horas = "15 horas";
$nombrerelator = "Johanna L�pez-Dur�n";
$firmarelator = "Firma_Johanna.png";

}
else if ($curso ==  3819)
{
$nombrediploma1 = "Nueva Ley sobre el Contrato de";
$nombrediploma2 = "Trabajo por Obra o Faena";

$lugarfecha = "Santiago, 9 de agosto de 2019";

$horas = "8 horas";
$nombrerelator = "Ricardo Liendo";
$firmarelator = "Firma_Liendo_0711.png";

}
else if ($curso ==  3807)
{
$nombrediploma1 = "Aspectos Pr�cticos Relevantes del Trabajo";
$nombrediploma2 = "en R�gimen de Subcontrataci�n";

$lugarfecha = "Santiago, 13 de agosto de 2019";

$horas = "8 horas";
$nombrerelator = "Ricardo Liendo";
$firmarelator = "Firma_Liendo_0711.png";

}
else if ($curso ==  3758)
{
$nombrediploma1 = "Administraci�n de Bodegas y Codificaci�n";
$nombrediploma2 = "";

$lugarfecha = "Santiago, 19 y 20 de agosto de 2019";

$horas = "15 horas";
$nombrerelator = "Jaime Salom";
$firmarelator = "Firma_Salom.png";

}

else if ($curso ==  3889)
{
$nombrediploma1 = "Sistemas de Mantenci�n y Protecci�n Contra";
$nombrediploma2 = " Incendio: Aplicaci�n de la Norma NFPA 25";

$lugarfecha = "Santiago, 20 y 21 de agosto de 2019";

$horas = "15 horas";
$nombrerelator = "Juan Ram�n Flores";
$firmarelator = "Firma_Flores.png";

}

else if ($curso ==  3857)
{
$nombrediploma1 = "Fraudes Corporativos:";
$nombrediploma2 = "Naturaleza, Prevenci�n y Detecci�n";

$lugarfecha = "Santiago, 22 de agosto de 2019";

$horas = "8 horas";
$nombrerelator = "Christian Nino-Moris";
$firmarelator = "Firma_Nino-Moris.png";

}
else if ($curso ==  3891)
{
$nombrediploma1 = "Manejo de Crisis: Psicolog�a de la Emergencia";
$nombrediploma2 = "Aplicada a Contingencias en la Empresa";

$lugarfecha = "Santiago, 27 de agosto de 2019";

$horas = "8 horas";
$nombrerelator = "Cristian Araya";
$firmarelator = "Firma_Araya.png";

}
else if ($curso ==  3890)
{
$nombrediploma1 = "Sistemas de Mantenci�n y Protecci�n Contra";
$nombrediploma2 = "Incendio: Aplicaci�n de la Norma NFPA 25";

$lugarfecha = "Antofagasta, 27 Y 28 de agosto de 2019";

$horas = "15 horas";
$nombrerelator = "Juan Ram�n Flores";
$firmarelator = "Firma_Flores.png";

}

else if ($curso ==  3836)
{
$nombrediploma1 = "Pr�cticas Efectivas de Planificaci�n y";
$nombrediploma2 = "Control de Parada de Planta";

$lugarfecha = "Santiago, 3 y 4 de septiembre de 2019";

$horas = "15 horas";
$nombrerelator = "Miguel Libbrecht";
$firmarelator = "Firma_Libbrecht.png";

}

else if ($curso ==  3871)
{
$nombrediploma1 = "Gesti�n Estrat�gica de las Compensaciones";
$nombrediploma2 = "";

$lugarfecha = "Santiago, 5 de septiembre de 2019";

$horas = "8 horas";
$nombrerelator = "Rodrigo Ianiszewski";
$firmarelator = "Firma_Ianiszewski.png";

}

else if ($curso ==  3845)
{
$nombrediploma1 = "Contrataci�n de Extranjeros en Chile";
$nombrediploma2 = "";

$lugarfecha = "Santiago, 6 de septiembre de 2019";

$horas = "8 horas";
$nombrerelator = "Ricardo Liendo";
$firmarelator = "Firma_Liendo_0711.png";

}

else if ($curso ==  3859)
{
$nombrediploma1 = "Reforma Laboral:";
$nombrediploma2 = "Sindicatos y Negociaci�n Colectiva";

$lugarfecha = "Santiago, 10 y 11 de septiembre de 2019";

$horas = "15 horas";
$nombrerelator = "Ricardo Liendo";
$firmarelator = "Firma_Liendo_0711.png";

}

else if ($curso ==  3848)
{
$nombrediploma1 = "Sistemas de Protecci�n Contra Incendio:";
$nombrediploma2 = "Aplicaci�n de Normas NFPA 72, 13, 20 y 25";

$lugarfecha = "Santiago, 24 y 25 de septiembre de 2019";

$horas = "15 horas";
$nombrerelator = "Juan Ram�n Flores";
$firmarelator = "Firma_Flores.png";

}

$diplomaPdf = new DiplomaPdf('L','mm','letter');
$diplomaPdf->SetAutoPageBreak(false);
$diplomaPdf->renderFirma($firmarelator,210,163,50);
//$diplomaPdf->renderFirma($firmarelator,220,150,20);
$diplomaPdf->nombreCurso($nombre,$nombrediploma1,$nombrediploma2,$lugarfecha,$horas);
$diplomaPdf->footer2($nombrerelator);
$diplomaPdf->Output();
?>