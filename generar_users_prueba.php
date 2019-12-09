<?php
 require_once('includes/load.php');
//$id_curso = $_POST['id_curso'];
$id_curso = 3852;

 $inscripciones = find_by_sql("SELECT p.id,nombres,apellidos, email, cargo, telefono,p.rut, p.id_curso,razonsocial,id_matricula FROM participante p join registro_usuario ru on (p.id_inscripcion = ru.id) left join matriculas m on (m.rut = p.rut) where p.id_curso = $id_curso");


foreach($inscripciones as $inscripcion)
{

     $nombre = $inscripcion['nombres']." ".$inscripcion['apellidos'];
	 $email = $inscripcion['email'];
	 $rut = $inscripcion['rut'];
	 $contrasena = sha1($rut);
	 echo $nombre."/".$email."/".$rut."/".$contrasena;
	 echo "<br>";
	 /* $sql  = "INSERT INTO `users` (`name`, `email` , `username` , `password`, `user_level`, `status`)";
      $sql .= " VALUES ('{$nombre}','{$email}', '{$rut}' , '{$contrasena}','2','1')";
     
	 
     if(!$db->query($query)){

       $session->msg('d',' Lo siento, registro falló.');
       redirect('matricular.php?id='.$id_curso , false);
	   
     } 
	 */
	 
}

?>