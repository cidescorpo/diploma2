<?php include_once('includes/load.php'); ?>
<?php
$req_fields = array('username','password' );
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$username =str_replace('.', '', $username);
$username =str_replace('-', '', $username);
$password = remove_junk($_POST['password']);



if(empty($errors)){

  if(!validar_email($username)){ $session->msg("d", "Rut no existe en nuestros registros, contactate con nosotros");
    redirect('index.php',false); }
  $user_id = authenticate($username, $password);
  if($user_id){
    //create session with id
     $session->login($user_id);
	
    //Update Sign in time
     updateLastLogIn($user_id);
	 $nivel = level_user($user_id);
     if($nivel['user_level'] == 2)
	 {
	$user = current_user();
	 
	$id_curso = current_user_curso($user['rut']);
	$session->setCurso($id_curso['id_curso']);
	
	 $session->msg("s", "Bienvenido");
     redirect('home.php',false);
	 
	 
	 
	 }
	 else if($nivel['user_level'] == 1){
	 		$session->msg("s", "Bienvenido");
     		redirect('clientes.php',false);
	 		
	 		}

  } else {
    $session->msg("d", "Contraseña incorrecta.");
    redirect('index.php',false);
  }

} else {
   $session->msg("d", $errors);
   redirect('index.php',false);
}

?>
