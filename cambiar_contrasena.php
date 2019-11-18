<?php
  $page_title = 'Cambiar Contraseña';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
    $user = current_user();
		
 if(empty($session->getCursoId()))
 {
 	$session->msg("s", "Selecciona tu curso.");
    redirect('mis-cursos.php',false);
 }


$id_curso  = $session->getCursoId();


 $rut = $user['username'];
$estado_usuario = find_by_sql_assoc("SELECT * FROM  matriculas where id_curso = $id_curso and rut =  '$rut'");

$datoscurso = find_by_sql_assoc("SELECT * FROM `confirmados` tcp join material_curso mc on (tcp.id_seminario = mc.id_curso) LEFT JOIN relator_aula_virtual rav on (tcp.REL1 = rav.cod_relator) where tcp.id_seminario = $id_curso");


 
include_once('layouts/header.php'); ?>
  <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb border-bottom">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                        <h5 class="font-medium text-uppercase mb-0">Cambiar Contraseña</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item"><?php echo $datoscurso['DESSEM']; ?></li>
                                
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
<div class="page-content container-fluid">
<div class="row">
<div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
                    <div class="col-12">
                        <div class="card">
						 
                             
                            
                           
                            <form class="form-horizontal" action="cambiar_contrasena_guardar.php" method="post">
							<input type="hidden" name="rut" value="<?php echo $rut; ?>">
						
                             
								<div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6">
                                             
                                    <label>Password</label>
                                    <input type="password" name="contrasena" class="form-control form-control-xs input_rut" placeholder="Password"  aria-describedby="basic-addon1" required>
									<br />
									 </div>
									 <div class="col-sm-6 col-lg-6">
                                        </div>
										
										<div class="col-sm-6 col-lg-6">
                                    
                                
								<label>Repita Password</label>
                                    <input type="password" name="contrasena2"  class="form-control form-control-xs input_rut" placeholder="Repita Password"  aria-describedby="basic-addon1" required>
						
                                
                                
                                        </div>
										<div class="col-sm-6 col-lg-6">
                                        </div>
										
                                    </div>
									</div>
								
                                <div class="card-body">
								 <div class="row">
                                        <div class="col-sm-6 col-lg-6">
                                    <div class="form-group mb-0 text-center">
                                        <button type="submit" class="btn btn-info btn-lg waves-effect waves-light">Cambiar Contraseña</button>
                                    </div>
									</div>
									</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
				</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />


<script language="javascript">
$("#bt1").on("click", function() {
  var classArr = ["btn-success", "btn-primary", "btn-warning","btn-danger"];
  $("#bt1").removeClass(classArr.toString().replace(/,/g," "));
  var value = $(this).find("input[name='options']").val();
  $(this).addClass(classArr[value - 1]);
});	


</script>				 
<?php include_once('layouts/footer.php'); ?>
