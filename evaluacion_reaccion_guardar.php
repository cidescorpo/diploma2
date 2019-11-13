<?php
 require_once('includes/load.php');

  $id_usuario = $db->escape($_POST['id_usuario']);
  $id_curso = $db->escape($_POST['id_curso']);
  $options1 = $db->escape($_POST['options1']);
  $options2 = remove_junk($db->escape($_POST['options2']));
  $options3 = remove_junk($db->escape($_POST['options3']));
  $options4 = remove_junk($db->escape($_POST['options4']));
  $options5 = remove_junk($db->escape($_POST['options5']));
  $options6 = remove_junk($db->escape($_POST['options6']));
  $options7 = remove_junk($db->escape($_POST['options7']));
  $options8 = remove_junk($db->escape($_POST['options8']));
  $options9 = remove_junk($db->escape($_POST['options9']));
  $options10 = remove_junk($db->escape($_POST['options10']));
  $options11 = remove_junk($db->escape($_POST['options11']));
 
  $resumen = remove_junk($db->escape($_POST['resumen']));
  $sugerenciasycriticas = remove_junk($db->escape($_POST['sugerenciasycriticas']));
  $intereses = remove_junk($db->escape($_POST['intereses']));
  $id_participante = remove_junk($db->escape($_POST['id_participante']));
  
  if(!empty($_POST['opinionsi']))
  { 
  	$opinionsi = remove_junk($db->escape($_POST['opinionsi']));
	}
	else{ $opinionsi = NULL; 
	}
	
	 $query = "UPDATE `matriculas` SET `registro` = '1'  WHERE id_curso = $id_curso and id_participante =  $id_participante";
	if(!$db->query($query)){
	  $session->msg("d", "Lo siento, el ingreso de la ficha registro falló");
        redirect('ficha_registro_participante.php',false);
	}
	  
   $query  = "INSERT INTO evaluacion_reaccion (";
     $query .=" opcion1,opcion2,opcion3,opcion4,opcion5,opcion6,opcion7,opcion8,opcion9,opcion10,opcion11,resumen,sugerenciasycriticas,intereses,opinionsi,id_usuario,id_curso";
     $query .=") VALUES (";
     $query .=" '{$options1}', '{$options2}', '{$options3}', '{$options4}','{$options5}','{$options6}', '{$options7}', '{$options8}', '{$options9}', '{$options10}', '{$options11}', '{$resumen}', '{$sugerenciasycriticas}', '{$intereses}', '{$opinionsi}', '{$id_usuario}', '{$id_curso}'";
     $query .=")";
	 
	 $db->query($query);
	 if($db->query($sql)){
	  ////////////////////////////////////////////////////////////////////////////////////////////////////
		 $session->msg("s", "MUCHAS GRACIAS!, Ahora puedes descargar el diploma de participación del curso");
        redirect('home.php',false);
      } else {
        $session->msg("d", "Lo siento, el ingreso de la evaluación de reacción falló");
        redirect('evaluacion_reaccion.php',false);
      }
?>