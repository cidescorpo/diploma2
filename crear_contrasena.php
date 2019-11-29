<?php
  ob_start();
  require_once('includes/load.php');
  //if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
  if(isset($_GET['rut'])) {$rut =  $_GET['rut'];}
  else {$rut = "";}
  
  if(isset($_GET['email'])) {$email =  $_GET['email'];}
  else {$email = "";}
?>
<!DOCTYPE html>
<html dir="ltr">
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
    <div class="main-wrapper">
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
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img src="assets/images/logos/logo-icon.png" alt="logo" /></span>
                        <p><h3 class="font-medium mb-3">Crear una Cuenta</h3></p>
						<div class="col-md-12">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iur</p>
      <p><?php if (isset($_GET['error'])) {echo "<span style='color:red;'>Contraseñas no coinciden o tienen menos de  4 caracteres</span>";} ?></p>
     </div>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal mt-3" id="loginform" action="generar_contrasena.php" method="post">
							
							<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                   
									
									<input type="text" class="form-control form-control-lg"  name="rut" id="rut" value="<?php echo $rut; ?>" placeholder="Ingrese Rut sin puntos ni guión" aria-label="rut" aria-describedby="basic-addon1"  required>
                                </div>
								
							<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                   
								
									<input type="text" class="form-control form-control-lg"  name="email" id="email" value="<?php echo $email; ?>" placeholder="Ingrese Email" aria-label="rut" aria-describedby="basic-addon1" required>
                                </div>
								
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="contrasena" class="form-control form-control-lg" placeholder="Ingrese Contraseña mas de 4 caracteres" aria-label="rut" aria-describedby="basic-addon1" required>
									<input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="contrasena2" class="form-control form-control-lg" placeholder="Repita Contraseña" aria-label="rut" aria-describedby="basic-addon1" required>
                                </div>
								
								<div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            
                                            
                                            <a href="index.php" id="to-recover" class="text-dark float-right"><i class="fas fa-sign-in-alt"></i> Ya tienes Cuenta? Ingresa</a>
                                        </div>
                                    </div>
                                </div>
								
                                <div class="form-group text-center">
                                    <div class="col-xs-12 pb-3">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">Crear Contraseña</button>
                                    </div>
									<div class="col-xs-12 pb-3">
                                        <p>Dudas o problemas contáctate con CIDES <br>Fono: (+562)23730170  &nbsp;Email: contacto@cides.com</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>
</body>
</html>