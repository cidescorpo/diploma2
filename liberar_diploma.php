<?php
require_once('includes/load.php');
$id_curso = $_GET['id_curso'];
$matriculas = find_by_sql("SELECT * FROM `matriculas`  where id_curso = $id_curso");
foreach($matriculas as $matricula)
	{
	
	
	 $rut = $matricula['rut'];
	  $query  = "update matriculas set 	liberar_diploma = 1  where rut =  '$rut' and id_curso = $id_curso";
     if(!$db->query($query)){

       $session->msg('d',' Lo siento, registro falló.');
       redirect('asistente.php?id='.$id_curso , false);
	   
     } 
	
	}

 $session->msg('S',' Diplomas Liberados Correctamente.');
       redirect('asistente.php?id='.$id_curso , false);
	   

?>