<?php
  $page_title = 'Agregar Cliente';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  //page_require_level(2);
  
  //$all_categories = find_all('categories');
  //$all_photo = find_all('media');
  if(isset($_GET['id_instancia']))
  {
  $id_instancia = $_GET['id_instancia'];
  $id_generico = $_GET['id_generico'];
  $fecha = $_GET['fecha'];
  $ciudad = $_GET['ciudad'];
  $nhoras = $_GET['nhoras'];
  $sence = $_GET['sence'];
  $lugar = $_GET['lugar'];
  $horarios = $_GET['horarios'];
  $seminario = $_GET['seminario'];

  }
  else { header("Location: http://www.cides.cl"); }

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
   
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        
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
                          <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="assets/images/logos/logo-text.png" alt="homepage" class="dark-logo" />
                                               </span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        
                    </div>
                </div>
            </div>
<div class="page-content container-fluid">
<div class="row"><div class="col-md-4"></div><div class="col-md-4"><h3 class="font-medium text-uppercase mb-0"><p>Formulario Inscripción</p></h3>
     </div><div class="col-md-4"></div></div>
<div class="row">

	 
     <div class="col-12">
                        <div class="card">
						<div class="card-body">
                                    <h4 class="card-title">1. CURSO <?php
									 echo "(".$id_generico."\\".$id_instancia.")&nbsp;&nbsp;".$seminario; ?></h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">
														<b>Fecha:&nbsp;</b><?php echo $fecha."<br>";  ?>
														<b>Ciudad:&nbsp;</b><?php echo $ciudad;  ?> 
														<?php  if (!empty($nhoras)) { echo "&nbsp;&nbsp;&nbsp;<b>Número de horas:&nbsp;</b>&nbsp;".$nhoras; }
														if (!empty($sence)) { echo "&nbsp;&nbsp;&nbsp;<b>Sence:&nbsp;</b>&nbsp;".$sence; } ?><br><b>OTEC:</b> Cides Corpotraining Ltda.   &nbsp;&nbsp;<b>RUT:</b> 77.334.850-2<br>
														
														<?php  if (!empty($lugar)) { echo "<b>Lugar específico de realización:</b>&nbsp;".$lugar; } else { ?>
														<b>Lugar específico de realización:</b> Se indicará el lugar de realización cuando la actividad esté confirmada
														<?php } ?>
														</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static"> <b>Horarios:</b></br>  
														<?php  if (!empty($horarios)) { echo $horarios."<br>"; } ?>
														 
                                                    </div>
                                                
                                            </div>
                                    </div>
                                </div>
								
                            <div class="card-body">
							
                                <h4 class="card-title">Notas:</h4>
                                <ol>
  <li>Actividad de capacitación autorizada por el SENCE para los efectos de la franquicia tributaria de capacitación, no conducente al otorgamiento de un título o grado académico.</li>
  <li>Aunque Ud. opere con OTIC, deberá igualmente hacer su inscripción enviándonos el presente formulario.</li>
</ol>
                            </div>
                            <hr>
							
                            <form class="form-horizontal" action="gracias-inscripcion_cides.php" onSubmit="return checkSubmit();" method="post">
                                
						   <div class="card-body">
                                    <h4 class="card-title">FAVOR INSCRIBIR A:</h4>
									<p>Utilice el símbolo [+] ubicado a la derecha para agregar más participantes</p>
									<div id="education_fields" class=" mt-3"></div>
<div class="row">
								<div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nombres[]" placeholder="Nombres *" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control"  name="apellidos[]" placeholder="Apellidos *" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control"  name="rut[]" placeholder="Rut *" required>
                                        </div>
                                    </div>
									 <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="email" class="form-control"  name="email[]" placeholder="E-mail *" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="telefono[]" placeholder="Tel&eacute;fono" >
                                        </div>
                                    </div>
									<div class="col-sm-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="cargo[]" placeholder="Cargo" >
                                        </div>
                                    </div>
									<div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="ciudad[]" placeholder="Ciudad Trabajo" >
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <button class="btn btn-success" type="button" onClick="education_fields();"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
								<div class="row">
								<div class="col-sm-12">
								<div class="form-group">
								<br>
                                    <label>Vendr&aacute; por Empresa o como Particular? *</label>
                                    <fieldset class="radio">
                                    	<label for="radio1">
                                        <input type="radio"  name="empresaoparticular" value="empresa" required>Empresa</label>&nbsp;&nbsp;&nbsp;<label for="radio1">  <input type="radio" name="empresaoparticular" value="particular" required>Particular</label>
                                		</fieldset>
                                </div>
								</div>
								</div>	
                           </div>
                                <hr>
                                <div class="card-body">
                                    <h4 class="card-title">RESPONSABLE DE LA INSCRIPCIÓN</h4>
                                    <div class="row">
                                       <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre *</label>
                                                    <input type="hidden" name="id_curso" value="<?php echo $id_instancia; ?>">
													<input type="hidden" name="nombre_curso" value="<?php echo $seminario; ?>">
													<input type="hidden" name="fecha_curso" value="<?php echo $fecha; ?>">
													<input type="hidden" name="ciudad_curso" value="<?php echo $ciudad; ?>">
													
                                                    <input type="text" class="form-control" name="nombre_r" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Apellidos *</label>
                                                    <input type="text" class="form-control" name="apellidos_r" required>
                                                </div>
                                            </div>
                                    </div>
									<div class="row">
                                       <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email *</label>
                                                    <input type="email" class="form-control" name="email_r" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Teléfono *</label>
                                                    <input type="text" class="form-control" name="telefono_r" required>
                                                </div>
                                            </div>
                                    </div>
									<div class="row">
                                       <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Rut *</label>
                                                    <input type="text" class="form-control" name="rut_r" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Cargo</label>
                                                    <input type="text" class="form-control" name="cargo_r" >
                                                </div>
                                            </div>
                                    </div>
									<div class="row">
                                       <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Empresa/Org</label>
                                                    <input type="text" class="form-control" name="empresa_r" >
                                                </div>
                                            </div>
                                    </div>
									
                                </div>
                                <hr>
								<div class="card-body">
                                    <h4 class="card-title">DATOS PARA LA FACTURA:</h4>
									<div class="row">
                                       <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Razón Social (Empresa/Persona) *</label>
                                                    <input type="text" class="form-control" name="razonsocial" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Rut *</label>
                                                    <input type="text" class="form-control" name="rutempresa" required>
                                                </div>
                                            </div>
                                    </div>
									<div class="row">
                                       <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Giro</label>
                                                    <input type="text" class="form-control" name="giro" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                    <input type="text" class="form-control" name="telefonoempresa" >
                                                </div>
                                            </div>
                                    </div>
									<div class="row">
                                       <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dirección</label>
                                                    <input type="text" class="form-control" name="direccionempresa" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Comuna</label>
                                                     <input type="text" class="form-control" name="comunaempresa" >
                                                </div>
                                            </div>
                                    </div>
									<div class="row">
                                       <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Utilizará Otic *:</label>
                                                    <fieldset class="radio">
                                    	<label for="radio1">
                                        <input type="radio"  name="usaotic" value="si" required>si</label>&nbsp;&nbsp;&nbsp;<label for="radio1">  <input type="radio" name="usaotic" value="no" required>no</label>
                                		</fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre OTIC (si corresponde)</label>
                                                     <input type="text" class="form-control" name="nombreotic" >
                                                </div>
                                            </div>
                                    </div>
									<div class="row">
									<div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Utilizará Sence:</label>
                                                    <fieldset class="radio">
                                    	<label for="radio1">
                                        <input type="radio"  name="usasence" value="si">si</label>&nbsp;&nbsp;&nbsp;<label for="radio1">  <input type="radio" name="usasence" value="no" >no</label>
                                		</fieldset>
                                                </div>
                                            </div>
                                       <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Valor Total a Cancelar</label>
                                                    <input type="number" class="form-control" name="valortotal" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"> 
                                                    
                                                </div>
                                            </div>
                                    </div>
                                   
                                </div>
                                <hr>
								<div class="card-body">
                                    <h4 class="card-title">Enviar Factura a:</h4>
									<div class="row">
                                       <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                     <input type="text" class="form-control" name="nombreenviara" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Cargo</label>
                                                    <input type="text" class="form-control" name="cargoenviara" >
                                                </div>
                                            </div>
                                    </div>
									<div class="row">
                                       <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                     <input type="text" class="form-control" name="emailenviara" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dirección</label>
                                                    <input type="text" class="form-control" name="direccionenviara" >
                                                </div>
                                            </div>
                                    </div>
									<div class="row">
                                       <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                     <input type="text" class="form-control" name="telefonoenviara" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
												<label for="email2" class="text-left control-label col-form-label">Marcar los documentos referenciales cuyos Nºs desea se incluyan en la factura: O/C:</label>
                                                    <fieldset class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="oc">O/C</label>
                                </fieldset>
                                <fieldset class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="hes">HES</label>
                                </fieldset>
                                <fieldset class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="npedido">N° Pedido</label>
                                </fieldset>
                                                </div>
                                            </div>
                                    </div>
									
									<div class="row">
                                       <div class="col-md-12">
                                                <div class="form-group">
                                                    
                                                     <label for="email2" class="text-left control-label col-form-label"><b>Si desea que llegue el email de aviso al cliente seleccione</b> <input type="checkbox" value="1" name="emailacliente">Email a Cliente</label>
                                                </div>
                                            </div>
                                            
                                    </div>
									
                                </div>
								<hr />
                                <div class="card-body">
                                    <div class="form-group mb-0 text-right">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Enviar</button>
                                    </div>
                                </div>
                            </form>
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
	 <script src="assets/libs/jquery.repeater/jquery.repeater.min.js"></script>
	 <script src="assets/extra-libs/jquery.repeater/repeater-init.js"></script>
	 <script>
	 $('#zero_config').DataTable();


       var room = 1;

function education_fields() {

    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = '<div class="row"><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" name="nombres[]"  placeholder="Nombres *" required></div></div><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" name="apellidos[]" placeholder="Apellidos *" required></div></div><div class="col-sm-1"> <div class="form-group"> <input type="text" class="form-control" name="rut[]" placeholder="Rut *" required> </div></div><div class="col-sm-2"> <div class="form-group"> <input type="text" class="form-control" name="email[]" placeholder="E-mail *" required> </div></div><div class="col-sm-1"> <div class="form-group"> <input type="text" class="form-control" name="telefono[]" placeholder="Tel&eacute;fono" required> </div></div><div class="col-sm-1"> <div class="form-group"> <input type="text" class="form-control" name="cargo[]" placeholder="Cargo" required> </div></div><div class="col-sm-2"> <div class="form-group"> <input type="text" class="form-control" name="ciudad[]" placeholder="Ciudad Trabajo"> </div></div><div class="col-sm-1"> <div class="form-group"> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button> </div></div></div>';

    objTo.appendChild(divtest)
}

function remove_education_fields(rid) {
    $('.removeclass' + rid).remove();
}

function checkSubmit() {
    document.getElementById("btsubmit").value = "Enviando...";
    document.getElementById("btsubmit").disabled = true;
    return true;
}

     </script>
</body>
</html>