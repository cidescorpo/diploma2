<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  
  
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];
$rut = $_POST['rut'];
//sacar el nombre de otro lado
 	  
if( ($contrasena == $contrasena2) and strlen($contrasena) > 3)
{
	  
	  $contrasena = sha1($contrasena);
	  $sql  = "UPDATE `users` set `password` = '$contrasena' ";
      $sql .= " where username = '$rut'";
      if($db->query($sql)){
        $session->msg("s", "Clave Cambiada Exitosamente.");
        redirect('home.php',false);
      } else {
        $session->msg("d", "Lo siento, registro falló");
        redirect('cambiar_contrasena.php',false);
      }
}
else {
	//echo "Contraseñas no coinciden o tienen menos de  4 caracteres";
	
	$session->msg("d","Contraseñas no coinciden o tienen menos de  4 caracteres");
	redirect('cambiar_contrasena.php',false);
}

?>