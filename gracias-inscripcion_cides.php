<?php
 require_once('includes/load.php');
 error_reporting(-1);
 $i = 0;
 if(empty($_POST['id_curso']))
 {
 	header('Location: http://www.cides.cl');
 }
$id_curso = $_POST['id_curso'];
 $nombre_curso = $_POST['nombre_curso'];
  $fecha_curso = $_POST['fecha_curso'];
  $ciudad_curso = $_POST['ciudad_curso'];
  
  $nombre_r = remove_junk($db->escape($_POST['nombre_r']));
  $apellidopaterno_r = remove_junk($db->escape($_POST['apellidos_r']));
  $email_r = remove_junk($db->escape($_POST['email_r']));
  $telefono_r = remove_junk($db->escape($_POST['telefono_r']));
  $rut_r = remove_junk($db->escape($_POST['rut_r']));
  $cargo_r = remove_junk($db->escape($_POST['cargo_r']));
  $empresa_r = remove_junk($db->escape($_POST['empresa_r']));
  $razonsocial = remove_junk($db->escape($_POST['razonsocial']));
  $rutempresa = remove_junk($db->escape($_POST['rutempresa']));
  $giro = remove_junk($db->escape($_POST['giro']));
  $telefonoempresa = remove_junk($db->escape($_POST['telefonoempresa']));
  $direccionempresa = remove_junk($db->escape($_POST['direccionempresa']));
  $comunaempresa = remove_junk($db->escape($_POST['comunaempresa']));
  //$nregistroaccion = remove_junk($db->escape($_POST['nregistroaccion']));
  $nombreotic = remove_junk($db->escape($_POST['nombreotic']));
  //$costoempresa = remove_junk($db->escape($_POST['costoempresa']));
  //$costootic = remove_junk($db->escape($_POST['costootic']));
  if( !empty($_POST['valortotal']) )
  {
  $valortotal = remove_junk($db->escape($_POST['valortotal']));
  } else {  $valortotal = "null";}
  
  $nombreenviara = remove_junk($db->escape($_POST['nombreenviara']));
  $cargoenviara = remove_junk($db->escape($_POST['cargoenviara']));
  $emailenviara = remove_junk($db->escape($_POST['emailenviara']));
  $direccionenviara = remove_junk($db->escape($_POST['direccionenviara']));
  $telefonoenviara = remove_junk($db->escape($_POST['telefonoenviara']));
  
   
  if(!empty($_POST['oc']))
  {
  	$oc = remove_junk($db->escape($_POST['oc']));
	}
	else{ $oc = 0; }
	if(!empty($_POST['hes']))
  {
  	$hes = remove_junk($db->escape($_POST['hes']));
	}
	else{ $hes = 0; }
	if(!empty($_POST['npedido']))
  {
  	$npedido = remove_junk($db->escape($_POST['npedido']));
	}
	else{ $npedido = 0; }
	if(!empty($_POST['usasence']))
  {
     if($_POST['usasence'] == 'si')
	 {
		$usasence = 1; 
	 }
	 else { $usasence = 0;  }
  	
	}
	else{ $usasence = "null"; }
	
	if(!empty($_POST['empresaoparticular']))
  {
  	$empresaoparticular = remove_junk($db->escape($_POST['empresaoparticular']));
	}
	else{ $empresaoparticular = ""; }
	
	
	if(!empty($_POST['usaotic']))
  { 
    if($_POST['usaotic'] == 'si')
	{
		$usaotic = 1;	
	}
	else { $usaotic = 0; }
  	
	}
	else{ $usaotic = "null"; }
	
	

 $query  = "INSERT INTO registro_usuario_2 (";
     $query .=" id_curso, nombre_r,apellidos_r,email_r,telefono_r,rut_r,cargo_r,empresa_r,razonsocial, rutempresa ,giro, telefonoempresa, direccionempresa, comunaempresa , usosence, nombreotic, valortotal, nombreenviara,cargoenviara,emailenviara, direccionenviara, telefonoenviara, ocenvia, hesenvia,npenvia,empresaoparticular, usaotic, fecha_ingreso,interno ";
     $query .=") VALUES (";
     $query .=" '{$id_curso}', '{$nombre_r}', '{$apellidopaterno_r}', '{$email_r}', '{$telefono_r}', '{$rut_r}', '{$cargo_r}', '{$empresa_r}', '{$razonsocial}', '{$rutempresa}','{$giro}', '{$telefonoempresa}','{$direccionempresa}','{$comunaempresa}', {$usasence},'{$nombreotic}',{$valortotal}, '{$nombreenviara}', '{$cargoenviara}', '{$emailenviara}', '{$direccionenviara}', '{$telefonoenviara}', {$oc}, {$hes}, {$npedido}, '{$empresaoparticular}', {$usaotic},now(), 1"; 
     $query .=")";
	 $db->query($query);
	 if($db->query($sql)){
	  ////////////////////////////////////////////////////////////////////////////////////////////////////
		 $session->msg("s", " Inscripcion ingresada exitosamente.");
        //redirect('add_clientes_2.php',false);
      } else {
        $session->msg("d", "Lo siento, la inscripci�n fall�");
        redirect('add_clientes_2.php',false);
      }
	  $id_inscripcion = $db->insert_id();
	  
foreach (array_keys($_POST['nombres']) as $key) {
  $nombres = remove_junk($db->escape($_POST['nombres'][$key]));
  $apellidos = remove_junk($db->escape($_POST['apellidos'][$key]));
  $rut = remove_junk($db->escape($_POST['rut'][$key]));
  $email = remove_junk($db->escape($_POST['email'][$key]));
  $telefono = remove_junk($db->escape($_POST['telefono'][$key]));
  $ciudad = remove_junk($db->escape($_POST['ciudad'][$key]));
  $cargo = remove_junk($db->escape($_POST['cargo'][$key]));
 
    $participantes[$i]['nombres'] = $nombres;
	$participantes[$i]['apellidos'] = $apellidos; 
	$participantes[$i]['rut'] = $rut; 
	$participantes[$i]['email'] = $email; 
	$participantes[$i]['telefono'] = $telefono; 
	$participantes[$i]['cargo'] = $cargo; 
	$participantes[$i]['ciudad'] = $ciudad;
  
    $query  = "INSERT INTO participante_2 (";
     $query .=" nombres,apellidos,rut,email,telefono,ciudad,cargo,id_curso,id_inscripcion ";
     $query .=") VALUES (";
     $query .=" '{$nombres}', '{$apellidos}', '{$rut}', '{$email}', '{$telefono}', '{$ciudad}', '{$cargo}' , '{$id_curso}', '{$id_inscripcion}'";
     $query .=")";
	 $db->query($query);
	 $i++;
  
  }
  $participantes_datos = "";
  for($i=0 ; $i < count($participantes); $i++)
  {
  	
	
	$participantes_datos .= '<tbody style="background-color:#f9f9f9"><tr>
<td style="padding:6px 10px;border-right:1px solid #dfdfdf;border-bottom:1px solid #dfdfdf;border-top:1px solid #fff;font-family:sans-serif;font-size:12px">'.$participantes[$i]['nombres'].'</td>
<td style="padding:6px 10px;border-right:1px solid #dfdfdf;border-bottom:1px solid #dfdfdf;border-top:1px solid #fff;font-family:sans-serif;font-size:12px">'.$participantes[$i]['apellidos'].'</td>
<td style="padding:6px 10px;border-right:1px solid #dfdfdf;border-bottom:1px solid #dfdfdf;border-top:1px solid #fff;font-family:sans-serif;font-size:12px">'.$participantes[$i]['rut'].'</td>
<td style="padding:6px 10px;border-right:1px solid #dfdfdf;border-bottom:1px solid #dfdfdf;border-top:1px solid #fff;font-family:sans-serif;font-size:12px">'.$participantes[$i]['email'].'</td>
<td style="padding:6px 10px;border-right:1px solid #dfdfdf;border-bottom:1px solid #dfdfdf;border-top:1px solid #fff;font-family:sans-serif;font-size:12px">'.$participantes[$i]['telefono'].'</td>
<td style="padding:6px 10px;border-right:1px solid #dfdfdf;border-bottom:1px solid #dfdfdf;border-top:1px solid #fff;font-family:sans-serif;font-size:12px">'.$participantes[$i]['cargo'].'</td>
<td style="padding:6px 10px;border-right:1px solid #dfdfdf;border-bottom:1px solid #dfdfdf;border-top:1px solid #fff;font-family:sans-serif;font-size:12px">'.$participantes[$i]['ciudad'].'</td>
</tr>
</tbody>';
  }
  
$datos_enviar_factura = ' <tr>
                                        	<td colspan="2" style="font-size:14px;font-weight:bold;background-color:#eee;border-bottom:1px solid #dfdfdf;padding:7px 7px">Enviar Factura a:</td>
	                                   </tr>';
if(!empty($nombreenviara))
{
$datos_enviar_factura .= '<tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Nombre</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">'.$nombreenviara.'</font>
		                                    </td>
		                               </tr>';
} 
else{
$datos_enviar_factura .= '<tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Nombre</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">&nbsp;</font>
		                                    </td>
		                               </tr>';


}
if(!empty($cargoenviara))
{
$datos_enviar_factura .= '<tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Cargo</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">'.$cargoenviara.'</font>
		                                    </td>
		                               </tr>';
}
else {
$datos_enviar_factura .= '<tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Cargo</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">&nbsp;</font>
		                                    </td>
		                               </tr>';
} 
if(!empty($emailenviara))
{
$datos_enviar_factura .= ' <tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Email</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px"><a href="mailto:'.$emailenviara.'" target="_blank">'.$emailenviara.'</a></font>
		                                    </td>
		                               </tr>';
} 
else {
$datos_enviar_factura .= ' <tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Email</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">&nbsp;</font>
		                                    </td>
		                               </tr>';
}

if(!empty($direccionenviara))
{
$datos_enviar_factura .= '<tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Direcci&oacute;n</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">'.$direccionenviara.'</font>
		                                    </td>
		                               </tr>';
} 
else {
$datos_enviar_factura .= '<tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Direcci&oacute;n</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">&nbsp;</font>
		                                    </td>
		                               </tr>';}

if(!empty($telefonoenviara))
{
$datos_enviar_factura .= '<tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Tel&eacute;fono</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">'.$telefonoenviara.'</font>
		                                    </td>
		                               </tr>';
}else {
$datos_enviar_factura .= '<tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Tel&eacute;fono</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">&nbsp;</font>
		                                    </td>
		                               </tr>';

} 


$datos_enviar_factura .= '<tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Marcar los documentos referenciales cuyos N&deg;s desea se incluyan en la factura: O/C:</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px"><ul class="m_784982383328523595bulleted">';
												
												
if($oc == 1)
{
$datos_enviar_factura .= '<li>O/C:</li>';
}
if($hes == 1)
{
$datos_enviar_factura .= '<li>HES:</li>';
} 
if($npedido == 1)
{
$datos_enviar_factura .= '<li>N&deg; Pedido:</li>';
}  
												
$datos_enviar_factura .= '</ul></font>
		                                    </td>
		                               </tr>';
												
												




if(!empty($empresaoparticular))
{	
$empresaoparticular_html = '<tr bgcolor="#EAF2FA">
	<td colspan="2">
		<font style="font-family:sans-serif;font-size:12px"><strong>Vendrá por Empresa o como Particular?</strong></font>
	</td>
</tr>
<tr bgcolor="#FFFFFF">
	<td width="20">&nbsp;</td>
	<td>
		<font style="font-family:sans-serif;font-size:12px">'.$empresaoparticular.'</font>
	</td>
</tr>';
}else { 
$empresaoparticular_html = '<tr bgcolor="#EAF2FA">
	<td colspan="2">
		<font style="font-family:sans-serif;font-size:12px"><strong>Vendrá por Empresa o como Particular?</strong></font>
	</td>
</tr>
<tr bgcolor="#FFFFFF">
	<td width="20">&nbsp;</td>
	<td>
		<font style="font-family:sans-serif;font-size:12px">&nbsp;</font>
	</td>
</tr>';
 }

$datos_responsable_variables = "";

if(!empty($cargo_r))
{
$datos_responsable_variables .= '<tr bgcolor="#EAF2FA">
	<td colspan="2">
		<font style="font-family:sans-serif;font-size:12px"><strong>Cargo</strong></font>
	</td>
</tr>
<tr bgcolor="#FFFFFF">
	<td width="20">&nbsp;</td>
	<td>
		<font style="font-family:sans-serif;font-size:12px">'.$cargo_r.'</font>
	</td>
</tr>';
}
else {
$datos_responsable_variables .= '<tr bgcolor="#EAF2FA">
	<td colspan="2">
		<font style="font-family:sans-serif;font-size:12px"><strong>Cargo</strong></font>
	</td>
</tr>
<tr bgcolor="#FFFFFF">
	<td width="20">&nbsp;</td>
	<td>
		<font style="font-family:sans-serif;font-size:12px">&nbsp;</font>
	</td>
</tr>';
}
if(!empty($empresa_r)){
$datos_responsable_variables .= '<tr bgcolor="#EAF2FA">
	<td colspan="2">
		<font style="font-family:sans-serif;font-size:12px"><strong>Empresa/Org</strong></font>
	</td>
</tr>
<tr bgcolor="#FFFFFF">
	<td width="20">&nbsp;</td>
	<td>
		<font style="font-family:sans-serif;font-size:12px">'.$empresa_r.'</font>
	</td>
</tr>'; }
else {
$datos_responsable_variables .= '<tr bgcolor="#EAF2FA">
	<td colspan="2">
		<font style="font-family:sans-serif;font-size:12px"><strong>Empresa/Org</strong></font>
	</td>
</tr>
<tr bgcolor="#FFFFFF">
	<td width="20">&nbsp;</td>
	<td>
		<font style="font-family:sans-serif;font-size:12px">&nbsp;</font>
	</td>
</tr>'; 
} 

$datos_facturar_variables = "";

if(!empty($giro)){
$datos_facturar_variables .= '<tr bgcolor="#EAF2FA">
<td colspan="2">
<font style="font-family:sans-serif;font-size:12px"><strong>Giro</strong></font>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="20">&nbsp;</td>
<td>
<font style="font-family:sans-serif;font-size:12px">'.$giro.'</font>
</td>
</tr>'; }
else {
$datos_facturar_variables .= '<tr bgcolor="#EAF2FA">
<td colspan="2">
<font style="font-family:sans-serif;font-size:12px"><strong>Giro</strong></font>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="20">&nbsp;</td>
<td>
<font style="font-family:sans-serif;font-size:12px">&nbsp;</font>
</td>
</tr>';
}

if(!empty($telefonoempresa)){
$datos_facturar_variables .= '<tr bgcolor="#EAF2FA">
<td colspan="2">
<font style="font-family:sans-serif;font-size:12px"><strong>Teléfono</strong></font>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="20">&nbsp;</td>
<td>
<font style="font-family:sans-serif;font-size:12px">'.$telefonoempresa.'</font>
</td>
</tr>'; }
else {
$datos_facturar_variables .= '<tr bgcolor="#EAF2FA">
<td colspan="2">
<font style="font-family:sans-serif;font-size:12px"><strong>Teléfono</strong></font>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="20">&nbsp;</td>
<td>
<font style="font-family:sans-serif;font-size:12px">&nbsp;</font>
</td>
</tr>'; 
}
if(!empty($direccionempresa)){
$datos_facturar_variables .= '<tr bgcolor="#EAF2FA">
<td colspan="2">
<font style="font-family:sans-serif;font-size:12px"><strong>Direcci&oacute;n</strong></font>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="20">&nbsp;</td>
<td>
<font style="font-family:sans-serif;font-size:12px">'.$direccionempresa.'</font>
</td>
</tr>'; }
else {
$datos_facturar_variables .= '<tr bgcolor="#EAF2FA">
<td colspan="2">
<font style="font-family:sans-serif;font-size:12px"><strong>Direcci&oacute;n</strong></font>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="20">&nbsp;</td>
<td>
<font style="font-family:sans-serif;font-size:12px">&nbsp;</font>
</td>
</tr>'; 
}

if(!empty($comunaempresa)){
$datos_facturar_variables .=  '<tr bgcolor="#EAF2FA">
<td colspan="2">
<font style="font-family:sans-serif;font-size:12px"><strong>Comuna</strong></font>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="20">&nbsp;</td>
<td>
<font style="font-family:sans-serif;font-size:12px">'.$comunaempresa.'</font>
</td>
</tr>';}
else {
$datos_facturar_variables .=  '<tr bgcolor="#EAF2FA">
<td colspan="2">
<font style="font-family:sans-serif;font-size:12px"><strong>Comuna</strong></font>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="20">&nbsp;</td>
<td>
<font style="font-family:sans-serif;font-size:12px">&nbsp;</font>
</td>
</tr>';
}
//sence
if(isset($usasence)){
if($usasence == '1')
{$textosence = "si";}
else if ($usasence == '0')
{$textosence = "no";}
$datos_facturar_variables .=  '<tr bgcolor="#EAF2FA">
<td colspan="2">
<font style="font-family:sans-serif;font-size:12px"><strong>Utilizará Sence:</strong></font>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="20">&nbsp;</td>
<td>
<font style="font-family:sans-serif;font-size:12px">'.$textosence .'</font>
</td>
</tr>';}
else {
$datos_facturar_variables .=  '<tr bgcolor="#EAF2FA">
<td colspan="2">
<font style="font-family:sans-serif;font-size:12px"><strong>Utilizará Sence:</strong></font>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="20">&nbsp;</td>
<td>
<font style="font-family:sans-serif;font-size:12px">&nbsp;</font>
</td>
</tr>';
}

if(isset($usaotic)){
if($usaotic == '1')
{$textousaotic = "si";}
else if($usaotic == '0')
{$textousaotic = "no";}
$datos_facturar_variables .=  '<tr bgcolor="#EAF2FA">
<td colspan="2">
<font style="font-family:sans-serif;font-size:12px"><strong>Utilizará Otic:</strong></font>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="20">&nbsp;</td>
<td>
<font style="font-family:sans-serif;font-size:12px">'.$textousaotic.'</font>
</td>
</tr>'; }
else {
$datos_facturar_variables .=  '<tr bgcolor="#EAF2FA">
<td colspan="2">
<font style="font-family:sans-serif;font-size:12px"><strong>Utilizará Otic:</strong></font>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="20">&nbsp;</td>
<td>
<font style="font-family:sans-serif;font-size:12px">&nbsp;</font>
</td>
</tr>'; 

}

if(!empty($nombreotic)){
$datos_facturar_variables .=  '<tr bgcolor="#EAF2FA">
<td colspan="2">
<font style="font-family:sans-serif;font-size:12px"><strong>Nombre OTIC</strong></font>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="20">&nbsp;</td>
<td>
<font style="font-family:sans-serif;font-size:12px">'.$nombreotic.'</font>
</td>
</tr>'; }
else {
$datos_facturar_variables .=  '<tr bgcolor="#EAF2FA">
<td colspan="2">
<font style="font-family:sans-serif;font-size:12px"><strong>Nombre OTIC</strong></font>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="20">&nbsp;</td>
<td>
<font style="font-family:sans-serif;font-size:12px">&nbsp;</font>
</td>
</tr>'; 

} 

if($valortotal != 'null'){
$datos_facturar_variables .=  '<tr bgcolor="#EAF2FA">
<td colspan="2">
<font style="font-family:sans-serif;font-size:12px"><strong>Valor Total a Cancelar</strong></font>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="20">&nbsp;</td>
<td>
<font style="font-family:sans-serif;font-size:12px">'.$valortotal.'</font>
</td>
</tr>'; }
else {
$datos_facturar_variables .=  '<tr bgcolor="#EAF2FA">
<td colspan="2">
<font style="font-family:sans-serif;font-size:12px"><strong>Valor Total a Cancelar</strong></font>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="20">&nbsp;</td>
<td>
<font style="font-family:sans-serif;font-size:12px">&nbsp;</font>
</td>
</tr>';
}
									   									     
  
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Ample admin Template - The Ultimate Multipurpose admin template</title>
	<link href="assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header border-right">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- Light Logo icon -->
                            <img src="assets/images/logos/logo-light-icon.png" alt="homepage" class="light-logo" />                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="assets/images/logos/logo-text.png" alt="homepage" class="dark-logo" />
                             <!-- Light Logo text -->    
                             <img src="assets/images/logos/logo-light-text.png" class="light-logo" alt="homepage" />                        </span>                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-18"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="starter-kit.html" aria-expanded="false"><i class="far fa-lightbulb"></i><span class="hide-menu">www.cides.cl</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
      
  <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb border-bottom">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                        <h5 class="font-medium text-uppercase mb-0">Formulario Inscripci&oacute;n</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">                    </div>
                </div>
            </div>
<div class="page-content container-fluid">
<div class="row"><div class="col-md-12">
       <?php 
	   
	 
	 //  echo display_msg($msg); 



$tabla_datos  = '<table class="mcnTextContentContainer" style="min-width: 100% !important; background-color: #eeeeee; border: 2px dotted;" border="0" width="100%" cellspacing="0" cellpadding="18">
<tbody>
<tr>
<td class="mcnTextContent" valign="top"><table width="99%" border="0" cellpadding="1" cellspacing="0" bgcolor="#EAEAEA"><tbody><tr><td>
                            <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
                            <tbody><tr>
                                        	<td colspan="2" style="font-size:14px;font-weight:bold;background-color:#eee;border-bottom:1px solid #dfdfdf;padding:7px 7px">FAVOR INSCRIBIR A:</td>
	                                   </tr>
	                                   <tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Participante</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px"><table class="m_784982383328523595gfield_list" style="border-top:1px solid #dfdfdf;border-left:1px solid #dfdfdf;border-spacing:0;padding:0;margin:2px 0 6px;width:100%"><thead><tr>
<th style="background-image:none;border-right:1px solid #dfdfdf;border-bottom:1px solid #dfdfdf;padding:6px 10px;font-family:sans-serif;font-size:12px;font-weight:bold;background-color:#f1f1f1;color:#333;text-align:left">Nombre</th>
<th style="background-image:none;border-right:1px solid #dfdfdf;border-bottom:1px solid #dfdfdf;padding:6px 10px;font-family:sans-serif;font-size:12px;font-weight:bold;background-color:#f1f1f1;color:#333;text-align:left">1er Apellido</th>
<th style="background-image:none;border-right:1px solid #dfdfdf;border-bottom:1px solid #dfdfdf;padding:6px 10px;font-family:sans-serif;font-size:12px;font-weight:bold;background-color:#f1f1f1;color:#333;text-align:left">Rut</th>
<th style="background-image:none;border-right:1px solid #dfdfdf;border-bottom:1px solid #dfdfdf;padding:6px 10px;font-family:sans-serif;font-size:12px;font-weight:bold;background-color:#f1f1f1;color:#333;text-align:left">E-mail</th>
<th style="background-image:none;border-right:1px solid #dfdfdf;border-bottom:1px solid #dfdfdf;padding:6px 10px;font-family:sans-serif;font-size:12px;font-weight:bold;background-color:#f1f1f1;color:#333;text-align:left">Tel&eacute;fono</th>
<th style="background-image:none;border-right:1px solid #dfdfdf;border-bottom:1px solid #dfdfdf;padding:6px 10px;font-family:sans-serif;font-size:12px;font-weight:bold;background-color:#f1f1f1;color:#333;text-align:left">Cargo</th>
<th style="background-image:none;border-right:1px solid #dfdfdf;border-bottom:1px solid #dfdfdf;padding:6px 10px;font-family:sans-serif;font-size:12px;font-weight:bold;background-color:#f1f1f1;color:#333;text-align:left">Ciudad</th>
</tr></thead>'.$participantes_datos.'<tbody></tbody></table>
</font>
		                                    </td>
		                               </tr>
									   '.$empresaoparticular_html.'
		                               <tr>
                                        	<td colspan="2" style="font-size:14px;font-weight:bold;background-color:#eee;border-bottom:1px solid #dfdfdf;padding:7px 7px">RESPONSABLE DE LA INSCRIPCI&Oacute;N</td>
	                                   </tr>
	                                   <tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Nombres</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">'.$nombre_r.'</font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Apellidos</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">'.$apellidopaterno_r.'</font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Email</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px"><a href="mailto:'.$email_r.'" target="_blank">'.$email_r.'</a></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Tel&eacute;fono</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">'.$telefono_r.'</font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Rut</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">'.$rut_r.'</font>
		                                    </td>
		                               </tr>
		                               '.$datos_responsable_variables.'
		                               <tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>curso</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">'.$nombre_curso.'</font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>instancia</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">'.$id_curso.'</font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>fecha</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">'.$fecha_curso.'</font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>ciudad</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">'.$ciudad_curso.'</font>
		                                    </td>
		                               </tr>
		                               <tr>
                                        	<td colspan="2" style="font-size:14px;font-weight:bold;background-color:#eee;border-bottom:1px solid #dfdfdf;padding:7px 7px">DATOS PARA LA FACTURA:</td>
	                                   </tr>
	                                   <tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Raz&oacute;n Social (Empresa/Persona)</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">'.$razonsocial.'</font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#EAF2FA">
		                                    <td colspan="2">
		                                        <font style="font-family:sans-serif;font-size:12px"><strong>Rut</strong></font>
		                                    </td>
		                               </tr>
		                               <tr bgcolor="#FFFFFF">
		                                    <td width="20">&nbsp;</td>
		                                    <td>
		                                        <font style="font-family:sans-serif;font-size:12px">'.$rutempresa.'</font>
		                                    </td>
		                               </tr>
		                               '.$datos_facturar_variables.'
		                              '.$datos_enviar_factura.'
		                               </tbody></table>
                        </td>
                   </tr>
               </tbody></table></td>
</tr>
</tbody>
</table>';
	   
$html =	'<table id="bodyTable" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td id="bodyCell" align="center" valign="top"><!-- BEGIN TEMPLATE // -->
<table id="templateContainer" border="0" width="600" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td align="center" valign="top"><!-- BEGIN PREHEADER // -->
<table id="templatePreheader" border="0" width="600" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="preheaderContainer" style="padding-top: 9px;" valign="top"></td>
</tr>
</tbody>
</table>
<!-- // END PREHEADER --></td>
</tr>
<tr>
<td align="center" valign="top"><!-- BEGIN HEADER // -->
<table id="templateHeader" border="0" width="600" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="headerContainer" valign="top">
<table class="mcnImageBlock" style="min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody class="mcnImageBlockOuter">
<tr>
<td class="mcnImageBlockInner" style="padding: 0px;" valign="top">
<table class="mcnImageContentContainer" style="min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td class="mcnImageContent" style="text-align: center; padding: 0 0px 0 0px;" valign="top"><img class="mcnImage" style="max-width: 600px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" src="https://gallery.mailchimp.com/5b05c9e924b03f0fb4dc74230/images/ff82b86b-92c2-44bf-90e9-d0980174cf43.jpg" alt="" width="600" align="center" /></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table class="mcnTextBlock" style="min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody class="mcnTextBlockOuter">
<tr>
<td class="mcnTextBlockInner" style="padding-top: 9px;" valign="top"><!-- [if mso]>
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
<tr>
				<![endif]--><!-- [if mso]>
<td valign="top" width="600" style="width:600px;">
				<![endif]-->
<table class="mcnTextContentContainer" style="max-width: 100%; min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td class="mcnTextContent" style="padding: 0px 18px 9px; color: #666666; font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; text-align: left;" valign="top">Hola '.$nombre_r.'</td>
</tr>
</tbody>
</table>
<!-- [if mso]></td>
<![endif]-->

<!-- [if mso]></tr>
</table>
<![endif]--></td>
</tr>
</tbody>
</table>
<table class="mcnTextBlock" style="min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody class="mcnTextBlockOuter">
<tr>
<td class="mcnTextBlockInner" style="padding-top: 9px;" valign="top"><!-- [if mso]>
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
<tr>
				<![endif]--><!-- [if mso]>
<td valign="top" width="600" style="width:600px;">
				<![endif]-->
<table class="mcnTextContentContainer" style="max-width: 100%; min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td class="mcnTextContent" style="padding: 0px 18px 9px; color: #666666; font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; text-align: left;" valign="top">Muchas gracias!
Hemos recibido correctamente el formulario de inscripci&oacute;n para el curso &quot;<strong>'.$nombre_curso.'</strong>&quot; programado para '.$fecha_curso.' en '.$ciudad_curso.'.</td>
</tr>
</tbody>
</table>
<!-- [if mso]></td>
<![endif]-->

<!-- [if mso]></tr>
</table>
<![endif]--></td>
</tr>
</tbody>
</table>
<table class="mcnTextBlock" style="min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody class="mcnTextBlockOuter">
<tr>
<td class="mcnTextBlockInner" style="padding-top: 9px;" valign="top"><!-- [if mso]>
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
<tr>
				<![endif]--><!-- [if mso]>
<td valign="top" width="600" style="width:600px;">
				<![endif]-->
<table class="mcnTextContentContainer" style="max-width: 100%; min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td class="mcnTextContent" style="padding: 0px 18px 9px; color: #666666; font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; text-align: left;" valign="top">Te estaremos contactando prontamente.</td>
</tr>
</tbody>
</table>
<!-- [if mso]></td>
<![endif]-->

<!-- [if mso]></tr>
</table>
<![endif]--></td>
</tr>
</tbody>
</table>
<table class="mcnTextBlock" style="min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody class="mcnTextBlockOuter">
<tr>
<td class="mcnTextBlockInner" style="padding-top: 9px;" valign="top"><!-- [if mso]>
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
<tr>
				<![endif]--><!-- [if mso]>
<td valign="top" width="600" style="width:600px;">
				<![endif]-->
<table class="mcnTextContentContainer" style="max-width: 100%; min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td class="mcnTextContent" style="padding: 0px 18px 9px; line-height: 125%;" valign="top">
<div style="text-align: center;"><span style="color: #b22222;">Nota*:</span>&nbsp;Una vez que confirmemos la realizaci&oacute;n de este Curso, t&uacute; y los participantes inscritos recibir&aacute;n un nuevo Email con todos los detalles relevantes para su asistencia.</div></td>
</tr>
</tbody>
</table>
<!-- [if mso]></td>
<![endif]-->

<!-- [if mso]></tr>
</table>
<![endif]--></td>
</tr>
</tbody>
</table>
<table class="mcnTextBlock" style="min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody class="mcnTextBlockOuter">
<tr>
<td class="mcnTextBlockInner" style="padding-top: 9px;" valign="top"><!-- [if mso]>
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
<tr>
				<![endif]--><!-- [if mso]>
<td valign="top" width="600" style="width:600px;">
				<![endif]-->
<table class="mcnTextContentContainer" style="max-width: 100%; min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td class="mcnTextContent" style="padding: 0px 18px 9px; line-height: 125%;" valign="top">Te invitamos a revisar la informaci&oacute;n que nos has proporcionado a continuaci&oacute;n:</td>
</tr>
</tbody>
</table>
<!-- [if mso]></td>
<![endif]-->

<!-- [if mso]></tr>
</table>
<![endif]--></td>
</tr>
</tbody>
</table>
<table class="mcnBoxedTextBlock" style="min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0"><!-- [if gte mso 9]>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
	<![endif]-->
<tbody class="mcnBoxedTextBlockOuter">
<tr>
<td class="mcnBoxedTextBlockInner" valign="top"><!-- [if gte mso 9]>
<td align="center" valign="top" ">
				<![endif]-->
<table class="mcnBoxedTextContentContainer" style="min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td style="padding: 9px 18px 9px 18px;">
'.$tabla_datos.'
</td>
</tr>
</tbody>
</table>
<!-- [if gte mso 9]></td>
<![endif]-->

<!-- [if gte mso 9]></tr>
</table>
<![endif]--></td>
</tr>
</tbody>
</table>
<table class="mcnTextBlock" style="min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody class="mcnTextBlockOuter">
<tr>
<td class="mcnTextBlockInner" style="padding-top: 9px;" valign="top"><!-- [if mso]>
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
<tr>
				<![endif]--><!-- [if mso]>
<td valign="top" width="600" style="width:600px;">
				<![endif]-->
<table class="mcnTextContentContainer" style="max-width: 100%; min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td class="mcnTextContent" style="padding: 0px 18px 9px; line-height: 125%;" valign="top">
<div style="text-align: center;"></div>
<span style="font-size: 12px;">No respondas directamente a este E-mail, para cualquier consulta, sugerencia o comentario, estaremos encantados de atenderte en contacto@cides.com o llamándonos al +56223730170 en Santiago – Chile.</span></td>
</tr>
</tbody>
</table>
<!-- [if mso]></td>
<![endif]-->

<!-- [if mso]></tr>
</table>
<![endif]--></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!-- // END HEADER --></td>
</tr>
<tr>
<td align="center" valign="top"><!-- BEGIN BODY // -->
<table id="templateBody" border="0" width="600" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="sectionContainer" align="left" valign="top" width="390">
<table id="templateBodyInner" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="bodyContainer" valign="top">
<table class="mcnTextBlock" style="min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody class="mcnTextBlockOuter">
<tr>
<td class="mcnTextBlockInner" style="padding-top: 9px;" valign="top"><!-- [if mso]>
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
<tr>
				<![endif]--><!-- [if mso]>
<td valign="top" width="396" style="width:396px;">
				<![endif]-->
<table class="mcnTextContentContainer" style="max-width: 100%; min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td class="mcnTextContent" style="padding: 0px 18px 9px; color: #666666; font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; text-align: left;" valign="top">Saludos cordiales y muchas gracias.</td>
</tr>
</tbody>
</table>
<!-- [if mso]></td>
<![endif]-->

<!-- [if mso]></tr>
</table>
<![endif]--></td>
</tr>
</tbody>
</table>
<table class="mcnTextBlock" style="min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody class="mcnTextBlockOuter">
<tr>
<td class="mcnTextBlockInner" style="padding-top: 9px;" valign="top"><!-- [if mso]>
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
<tr>
				<![endif]--><!-- [if mso]>
<td valign="top" width="396" style="width:396px;">
				<![endif]-->
<table class="mcnTextContentContainer" style="max-width: 100%; min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td class="mcnTextContent" style="padding: 0px 18px 9px; font-size: 13px;" valign="top">
<table border="0">
<tbody>
<tr>
<td>El equipo de CIDES Corpotraining</td>
</tr>
<tr>
<td>Av. Providencia 2370 Of. 36</td>
</tr>
<tr>
<td>Santiago - Chile</td>
</tr>
<tr>
<td>+56223730170</td>
</tr>
<tr>
<td><a href="http://www.cides.cl">www.cides.cl</a></td>
</tr>
<tr>
<td><a href="mailto:contacto@cides.com">contacto@cides.com</a></td>
</tr>
<tr>
<td><img style="width: 100px; height: 25px; margin: 0px;" src="https://www.cides.cl/wp-content/uploads/2019/06/logocides-1.png" width="100" height="25" align="none" /></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!-- [if mso]></td>
<![endif]-->

<!-- [if mso]></tr>
</table>
<![endif]--></td>
</tr>
</tbody>
</table>
<table class="mcnDividerBlock" style="min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody class="mcnDividerBlockOuter">
<tr>
<td class="mcnDividerBlockInner" style="min-width: 100%; padding: 18px;">
<table class="mcnDividerContent" style="min-width: 100%; border-top-width: 2px; border-top-style: solid; border-top-color: #EAEAEA;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td></td>
</tr>
</tbody>
</table>
<!--
<td class="mcnDividerBlockInner" style="padding: 18px;">

<hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />

--></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
<td class="sectionContainer" align="left" valign="top" width="200">
<table id="templateSidebar" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td align="right" valign="top">
<table id="templateSidebarInner" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="sidebarContainer" valign="top"></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!-- // END BODY --></td>
</tr>
<tr>
<td align="center" valign="top"><!-- BEGIN FOOTER // -->
<table id="templateFooter" border="0" width="600" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="footerContainer" style="padding-bottom: 9px;" valign="top"></td>
</tr>
</tbody>
</table>
<!-- // END FOOTER --></td>
</tr>
</tbody>
</table>
<!-- // END TEMPLATE --></td>
</tr>
</tbody>
</table>';

$html_cides = '<table id="bodyTable" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td id="bodyCell" align="center" valign="top"><!-- BEGIN TEMPLATE // -->
<table id="templateContainer" border="0" width="600" cellspacing="0" cellpadding="0">
<tbody>

<tr>
<td align="center" valign="top"><!-- BEGIN HEADER // -->
<table id="templateHeader" border="0" width="600" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="headerContainer" valign="top">


<table class="mcnTextBlock" style="min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody class="mcnTextBlockOuter">
<tr>
<td class="mcnTextBlockInner" style="padding-top: 9px;" valign="top"><!-- [if mso]>
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
<tr>
				<![endif]--><!-- [if mso]>
<td valign="top" width="600" style="width:600px;">
				<![endif]-->
<table class="mcnTextContentContainer" style="max-width: 100%; min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td class="mcnTextContent" style="padding: 0px 18px 9px; color: #666666; font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; text-align: left;" valign="top"><p style="text-align: center;"><strong>Confirmación de inscripción a Curso de CIDES: '.$nombre_curso.'</strong></p></td>
</tr>
</tbody>
</table>
<!-- [if mso]></td>
<![endif]-->

<!-- [if mso]></tr>
</table>
<![endif]--></td>
</tr>
</tbody>
</table>



<table class="mcnBoxedTextBlock" style="min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0"><!-- [if gte mso 9]>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
	<![endif]-->
<tbody class="mcnBoxedTextBlockOuter">
<tr>
<td class="mcnBoxedTextBlockInner" valign="top"><!-- [if gte mso 9]>
<td align="center" valign="top" ">
				<![endif]-->
<table class="mcnBoxedTextContentContainer" style="min-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td style="padding: 9px 18px 9px 18px;">
<table class="mcnTextContentContainer" style="min-width: 100% !important; background-color: #eeeeee; border: 2px dotted;" border="0" width="100%" cellspacing="0" cellpadding="18">
<tbody>
<tr>
<td class="mcnTextContent" valign="top">'.$tabla_datos .'</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!-- [if gte mso 9]></td>
<![endif]-->

<!-- [if gte mso 9]></tr>
</table>
<![endif]--></td>
</tr>
</tbody>
</table>

</td>
</tr>
</tbody>
</table>
<!-- // END HEADER --></td>
</tr>

<tr>
<td align="center" valign="top"><!-- BEGIN FOOTER // -->
<table id="templateFooter" border="0" width="600" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="footerContainer" style="padding-bottom: 9px;" valign="top"></td>
</tr>
</tbody>
</table>
<!-- // END FOOTER --></td>
</tr>
</tbody>
</table>
<!-- // END TEMPLATE --></td>
</tr>
</tbody>
</table>';	

	require("phpmailer/PHPMailerAutoload.php"); 


$asunto =  $nombre_r .', Confirmación de inscripción a Curso de CIDES';   
$asunto_admin = 'Confirmación de inscripción a Curso de CIDES (Cides lleno los datos): '.$nombre_curso;

$mail = new PHPMailer;

// Configuramos los datos de sesi�n para conectarnos al servicio SMTP de Mandrill
$mail->IsSMTP(); // Indicamos que vamos a utilizar SMTP
$mail->Host = 'smtp.mandrillapp.com'; // El Host de Mandrill               
$mail->Port = 587;  // El puerto que Mandrill nos indica utilizar
$mail->SMTPAuth = true; // Indicamos que vamos a utilizar auteticaci�n SMTP       
$mail->Username = 'CIDES Corpotraining'; // Nuestro usuario en Mandrill              
$mail->Password = 'Gkb9Mp6iBIxIGeDUWEfDZg'; // Key generado por Mandrill 
$mail->SMTPSecure = 'tls'; // Activamos el cifrado tls (tambi�n ssl)
$mail->CharSet = 'UTF-8';

// Ahora configuraremos los par�metros b�sicos de PHPMailer para hacer un env�o t�pico

$mail->From = 'contacto@cidescorp.cl'; // Nuestro correo electr�nico
$mail->FromName = 'CIDES Corpotraining'; // El nombre de nuestro sitio o proyecto
$mail->AddReplyTo('contacto@cides.com');
$mail->IsHTML(true); // Indicamos que el email tiene formato HTML                      
	
	if(!empty($_POST['emailacliente']))
  {
  	
	
	$mail->Subject = $asunto; // El asunto del email   
	$mail->Body = $html; 
	$mail->AddAddress($email_r); // Cargamos el e-mail destinatario a la clase PHPMailer
  	$mail->Send(); // Realiza el env�o =)
  	//$mail->ClearAddresses();
 }	
	$mail->ClearAllRecipients();  
	$mail->Subject = $asunto_admin; // El asunto del email   
	$mail->Body = $html_cides; 
	$mail->AddAddress('contacto@cides.com'); 
	$mail->AddAddress('hsolarster@gmail.com'); 
	$mail->Send(); 
	   
	   ?>
     </div></div>
<div class="row">

	 
     <div class="col-12">
                        <div class="card">
                            <div class="card-body">
              <h1 align="center">MUCHAS GRACIAS, hemos recibido tu Inscripci&oacute;n.</h1>
			  <h3 align="center">Te estaremos contactando a la brevedad posible para gestionar tu participaci&oacute;n en este Curso.</h1>
			  <p align="center">Te hemos enviado correo autom&aacute;tico con el respaldo de tu Inscripci&oacute;n; Revisa tu carpeta de correo no deseado en caso no lo encuentres en tu Inbox o agrega <br>contacto@cidescorp.cl a tu lista de contactos.</p>
			  <p>Lee los art&iacute;culos de nuestros relatores en el BLOG de Cides.</br>
S&iacute;guenos en Redes Sociales:</p>
<p>Si necesitas m&oacute;s informaci&oacute;n, puedes escribirnos a contacto@cides.com o bien llamarnos al (+56 2) 2373 0170<br><br>

Muchas gracias nuevamente!<br><br>
<a href="https://www.facebook.com/cidescorpotraining/" target="_blank"><i class="fab fa-facebook-square fa-3x"></i></a>
<a href="https://twitter.com/CidesCorpo" target="_blank"><i class="fab fa-twitter-square fa-3x"></i></a>
<a href="https://www.linkedin.com/company/cides-corpotraining" target="_blank"><i class="fab fab fa-linkedin fa-3x"></i></a>
<a href="https://www.youtube.com/user/CIDEScorpotraining/" target="_blank"><i class="fab fab fa-youtube fa-3x"></i></a>
<a href="https://www.instagram.com/cidescorpo/" target="_blank"><i class="fab fab fab fa-instagram fa-3x"></i></a>
<br>
CIDES Corpotraining.<br>
Grandes Cursos para Grandes Mentes</p>
                            </div>
                        </div>
                    </div>
                </div>
				</div>
			 
 <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                   All Rights Reserved by Cides Corpotraining            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/app.init.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
	
	 <script src="assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
	 <script src="dist/js/repeater.js" type="text/javascript"></script>
	 <script>
	 $('#zero_config').DataTable();
	   $(document).ready(function(){

        $('#repeater').createRepeater();
		 });
     </script>
</body>
</html>