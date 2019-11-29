<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  
  
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];
$email = $_POST['email'];
$rut = $_POST['rut'];
//sacar el nombre de otro lado

 $sql  = find_by_sql_assoc("select * from users where `username` = '$email' or rut = '$rut'");
 if(!empty($sql))
 {
 	$session->msg("s", "El usuario ya esta creado ingrese aqui.");
 	redirect('index.php',false);
	
 }
 else { 
 
 $sql  = find_by_sql_assoc("select * from participante where rut = '$rut'");
 	{
		$nombre =  $sql['nombres']." ".$sql['apellidos'];
		
	}
 }
 	  

if( ($contrasena == $contrasena2) and strlen($contrasena) > 3)
{
	  
	  $contrasena = sha1($contrasena);
	  $sql  = "INSERT INTO `users` (`name`, `username` , `rut` , `password`, `user_level`, `status`)";
      $sql .= " VALUES ('{$nombre}','{$email}', '{$rut}' , '{$contrasena}','2','1')";
      if($db->query($sql)){
        $session->msg("s", "Clave agregada exitosamente.");
        redirect('index.php',false);
      } else {
        $session->msg("d", "Lo siento, registro falló");
        redirect('cotizacion.php',false);
      }
}
else {
	//echo "Contraseñas no coinciden o tienen menos de  4 caracteres";
	
	$session->msg("d","Contraseñas no coinciden o tienen menos de  4 caracteres");
	
	header("Location: crear_contrasena.php?error=nosotros&email=ciber_punx@hotmail.com");
    //redirect('crear_contrasena.php?error=nosotros&email=ciber_punx@hotmail.com');
}

?>