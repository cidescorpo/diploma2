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
$nombrediploma1 = "Gestion de Activos Físicos";
$nombrediploma2 = "Acorde a ISO 55000";

$lugarfecha = "Santiago, 8 y 9 de julio de 2019";

$horas = "16 horas";
$nombrerelator = "José Durán"; 
$firmarelator = "Firma_Duran.png";
}
else if ($curso == 3797)
{
$nombrediploma1 = "Legislación Laboral Actualizada:";
$nombrediploma2 = "Relaciones Individuales del Trabajo";

$lugarfecha = "Santiago, 9 y 10 de julio de 2019";

$horas = "15 horas";
$nombrerelator = "Ricardo Liendo";
$firmarelator = "Firma_Liendo_0711.png";

} 	

else if ($curso == 3780)
{
$nombrediploma1 = "Planificación y Programación";
$nombrediploma2 = "del Mantenimiento";

$lugarfecha = "Santiago, 10 y 11 de julio de 2019";

$horas = "15 horas";
$nombrerelator = "Johanna López-Durán";
$firmarelator = "Firma_Johanna.png";

}
else if ($curso == 3781)
{
$nombrediploma1 = "Tribología: Ingeniería del";
$nombrediploma2 = "Desgaste";

$lugarfecha = "Santiago, 18 y 19 de julio de 2019";

$horas = "15 horas";
$nombrerelator = "Maurizio Edwards";
$firmarelator = "Firma_Edwards.png";

}
else if ($curso == 3816)
{
$nombrediploma1 = "Atención/Servicio al Cliente y";
$nombrediploma2 = "Comunicación";

$lugarfecha = "Santiago, 18 y 19 de julio de 2019";

$horas = "8 horas";
$nombrerelator = "Cristián Ruiz";
$firmarelator = "Firma_Ruiz.png";

}

else if ($curso == 3771)
{
$nombrediploma1 = "Técnicas Exitosas de Licitación y";
$nombrediploma2 = "Selección del Mejor Contratista";

$lugarfecha = "Santiago, 22 y 23 de julio de 2019";

$horas = "16 horas";
$nombrerelator = "Dan Church";
$firmarelator = "Firma_DanChurch.png";

}
else if ($curso == 3772)
{
$nombrediploma1 = "Administración y Ejecución de";
$nombrediploma2 = "Contratos";

$lugarfecha = "Santiago, 24 y 25 de julio de 2019";

$horas = "15 horas";
$nombrerelator = "Dan Church";
$firmarelator = "Firma_DanChurch.png";

}
else if ($curso == 3802)
{
$nombrediploma1 = "Aseguramiento y Control de la Calidad";
$nombrediploma2 = "en la Exploración Geológica y Minera";

$lugarfecha = "Santiago, 5 y 6 de agosto de 2019";

$horas = "16 horas";
$nombrerelator = "Armando Simón";
$firmarelator = "Firma_ArmandoSimon.png";

}

else if ($curso == 3804)
{
$nombrediploma1 = "Indicadores Claves de Desempeño en Mantenimiento:";
$nombrediploma2 = "Implementación y Monitoreo";

$lugarfecha = "Santiago, 6 y 7 de agosto de 2019";

$horas = "15 horas";
$nombrerelator = "Johanna López-Durán";
$firmarelator = "Firma_Johanna.png";

}

else if ($curso ==  3880)
{
$nombrediploma1 = "Administración de Fallas";
$nombrediploma2 = "de Alto Impacto";

$lugarfecha = "Santiago, 6, 7 y 8 de agosto de 2019";

$horas = "24 horas";
$nombrerelator = "Miguel Libbrecht";
$firmarelator = "Firma_Libbrecht.png";

}

else if ($curso ==  3855)
{
$nombrediploma1 = "Principios Básicos de Seguridad Eléctrica en";
$nombrediploma2 = "Lugares de Trabajo: Aplicación de NFPA 70E";

$lugarfecha = "Mejillones, 6 y 7 de agosto de 2019";

$horas = "15 horas";
$nombrerelator = "Juan Ramón Flores";
$firmarelator = "Firma_Flores.png";

}
else if ($curso ==  3805)
{
$nombrediploma1 = "Análisis de Causa Raíz acorde";
$nombrediploma2 = "a Normas Internacionales";

$lugarfecha = "Santiago, 8 y 9 de agosto de 2019";

$horas = "15 horas";
$nombrerelator = "Johanna López-Durán";
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
$nombrediploma1 = "Aspectos Prácticos Relevantes del Trabajo";
$nombrediploma2 = "en Régimen de Subcontratación";

$lugarfecha = "Santiago, 13 de agosto de 2019";

$horas = "8 horas";
$nombrerelator = "Ricardo Liendo";
$firmarelator = "Firma_Liendo_0711.png";

}
else if ($curso ==  3758)
{
$nombrediploma1 = "Administración de Bodegas y Codificación";
$nombrediploma2 = "";

$lugarfecha = "Santiago, 19 y 20 de agosto de 2019";

$horas = "15 horas";
$nombrerelator = "Jaime Salom";
$firmarelator = "Firma_Salom.png";

}

else if ($curso ==  3889)
{
$nombrediploma1 = "Sistemas de Mantención y Protección Contra";
$nombrediploma2 = " Incendio: Aplicación de la Norma NFPA 25";

$lugarfecha = "Santiago, 20 y 21 de agosto de 2019";

$horas = "15 horas";
$nombrerelator = "Juan Ramón Flores";
$firmarelator = "Firma_Flores.png";

}

else if ($curso ==  3857)
{
$nombrediploma1 = "Fraudes Corporativos:";
$nombrediploma2 = "Naturaleza, Prevención y Detección";

$lugarfecha = "Santiago, 22 de agosto de 2019";

$horas = "8 horas";
$nombrerelator = "Christian Nino-Moris";
$firmarelator = "Firma_Nino-Moris.png";

}
else if ($curso ==  3891)
{
$nombrediploma1 = "Manejo de Crisis: Psicología de la Emergencia";
$nombrediploma2 = "Aplicada a Contingencias en la Empresa";

$lugarfecha = "Santiago, 27 de agosto de 2019";

$horas = "8 horas";
$nombrerelator = "Cristian Araya";
$firmarelator = "Firma_Araya.png";

}
else if ($curso ==  3890)
{
$nombrediploma1 = "Sistemas de Mantención y Protección Contra";
$nombrediploma2 = "Incendio: Aplicación de la Norma NFPA 25";

$lugarfecha = "Antofagasta, 27 Y 28 de agosto de 2019";

$horas = "15 horas";
$nombrerelator = "Juan Ramón Flores";
$firmarelator = "Firma_Flores.png";

}

else if ($curso ==  3836)
{
$nombrediploma1 = "Prácticas Efectivas de Planificación y";
$nombrediploma2 = "Control de Parada de Planta";

$lugarfecha = "Santiago, 3 y 4 de septiembre de 2019";

$horas = "15 horas";
$nombrerelator = "Miguel Libbrecht";
$firmarelator = "Firma_Libbrecht.png";

}

else if ($curso ==  3871)
{
$nombrediploma1 = "Gestión Estratégica de las Compensaciones";
$nombrediploma2 = "";

$lugarfecha = "Santiago, 5 de septiembre de 2019";

$horas = "8 horas";
$nombrerelator = "Rodrigo Ianiszewski";
$firmarelator = "Firma_Ianiszewski.png";

}

else if ($curso ==  3845)
{
$nombrediploma1 = "Contratación de Extranjeros en Chile";
$nombrediploma2 = "";

$lugarfecha = "Santiago, 6 de septiembre de 2019";

$horas = "8 horas";
$nombrerelator = "Ricardo Liendo";
$firmarelator = "Firma_Liendo_0711.png";

}

else if ($curso ==  3859)
{
$nombrediploma1 = "Reforma Laboral:";
$nombrediploma2 = "Sindicatos y Negociación Colectiva";

$lugarfecha = "Santiago, 10 y 11 de septiembre de 2019";

$horas = "15 horas";
$nombrerelator = "Ricardo Liendo";
$firmarelator = "Firma_Liendo_0711.png";

}

else if ($curso ==  3848)
{
$nombrediploma1 = "Sistemas de Protección Contra Incendio:";
$nombrediploma2 = "Aplicación de Normas NFPA 72, 13, 20 y 25";

$lugarfecha = "Santiago, 24 y 25 de septiembre de 2019";

$horas = "15 horas";
$nombrerelator = "Juan Ramón Flores";
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