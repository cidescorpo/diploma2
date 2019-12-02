<?php
require_once('includes/load.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$id_curso = 3942;
$inscripciones = find_by_sql("SELECT p.id,nombres,apellidos, email, cargo, telefono,p.rut, p.id_curso, id_matricula,razonsocial,enviar_email_2,envio_email_1 FROM `participante` p join registro_usuario ru on (p.id_inscripcion = ru.id) left join matriculas m on (p.rut = m.rut) where p.id_curso = $id_curso");
  
  $cantidad_inscritos = count($inscripciones);
 
  $curso = find_by_sql("SELECT * FROM confirmados c left join  material_curso m on(c.id_seminario = id_curso ) where id_seminario = $id_curso");


require 'vendor/autoload.php';
$mail = new PHPMailer(true);


                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    $mail->SMTPSecure = false;                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
	
    $mail->setFrom('info@cidescorpo.cl', 'Cides');
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Agradecemos tu participación en el curso '.$curso[0]['DESSEM'];
	$body = file_get_contents('layoutemails/agradecimiento.html');
	
    
   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $body = str_replace("[NOMBREDELCURSO]", $curso[0]['DESSEM'], $body);
	//$body = str_replace("[CIUDAD]", $curso[0]['CIUDAD'], $body);
	//$body = str_replace("[NOMBREHOTEL]", $curso[0]['LLUGAR'], $body);
	//$body = str_replace("[FECHACOMPLETA]", $curso[0]['fec_pal'], $body);
	
	foreach($inscripciones as $inscripcion)
	{
	
	$bodyaux = str_replace("[NOMBRE]", $inscripcion['nombres'], $body);
	//$bodyaux = str_replace("[USER]", rut($inscripcion['rut']), $bodyaux);
	//$bodyaux = str_replace("[CLAVE]", $inscripcion['rut'], $bodyaux);	
	 $nombreresponsable =  $inscripcion['nombres']." ".$inscripcion['apellidos'];
	  $mail->addAddress($inscripcion['email'],$nombreresponsable);
	  $mail->Body    = $bodyaux;
      $mail->send();
	  $mail->ClearAddresses();
    //echo 'Message has been sent';
	}