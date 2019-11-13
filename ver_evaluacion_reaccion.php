<?php  
	$page_title = 'Agregar Cliente';
  	require_once('includes/load.php');
	$user = current_user();
	$id_curso = $session->getCursoId();

	$id_usuario = $user['id']; 
	$datosevaluacion = find_by_sql_assoc("SELECT * FROM `evaluacion_reaccion` where id_usuario = $id_usuario and id_curso = $id_curso"); 
	$datoscurso = find_by_sql_assoc("SELECT * FROM `confirmados` tcp join material_curso mc on (tcp.id_seminario = mc.id_curso) LEFT JOIN relator_aula_virtual rav on (tcp.REL1 = rav.cod_relator)  where tcp.id_seminario = $id_curso"); 
	$estado_usuario = find_by_sql_assoc("SELECT * FROM  matriculas where id_curso = $id_curso"); 

	include_once('layouts/header.php'); 
	?>
	 <!-- Page wrapper  -->
        <!-- ============================================================== --> 
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb border-bottom">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                        <h5 class="font-medium text-uppercase mb-0">Encuesta de Satisfacci&oacute;n</h5>
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

                    <div class="col-12">
                        <div class="card">
						 <div class="card-body">
								<?php if($msg){?>				<p> <h4 class="text-center text-success">
								<b>MUCHAS GRACIAS!<BR /> 

Ahora puedes descargar el diploma de participaci&oacute;n del curso</b></h4></p>
<p class="text-center"> <a href="descarga_pdf.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Ir a Descargar Diploma Participaci&oacute;n</a></p>
<br /><br /> 
              <?php }?>

                                    <h2 class="text-center"> <b><?php echo $datoscurso['DESSEM']; ?></b></h2>
                                   
									<div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group row text-center">
                                                    <div class="col-md-12">
													<b>Relator:</b>&nbsp;<?php   echo $datoscurso['nombre']." ".$datoscurso['apellido_paterno'];   ?>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group row text-center">
                                                    <div class="col-md-12">
													<b>Fecha:</b>&nbsp;<?php echo $datoscurso['fec_pal']; ?> 
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group row text-center">
                                                    <div class="col-md-12">
													<b>Lugar:</b>&nbsp;<?php echo $datoscurso['LLUGAR']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
									
									<div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group row text-center">
                                                    <div class="col-md-12">
													<b>Horarios:</b>&nbsp;	<?php echo $datoscurso['HORARI']; ?><br />
																			<?php echo $datoscurso['HORARI2']; ?><br />
																			<?php echo $datoscurso['HORARI3']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
									
                                </div>
                               
                            
                           
                          
							
                                <hr>
                                <div class="card-body">
                                    <h4 class="card-title">Tus Respuestas a la encuesta</h4>
                                    <div class="row">
										<div class="card-body">
                                    
				
<hr />				
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Contenido del Curso</h4>
													
                                                
                                            </div>
                                            <div class="col-md-6">
                                                
                                                    <?php echo $datosevaluacion['opcion1']; ?>
                                               
                                            </div>
                                    </div>
<hr />			
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Conocimientos Relator</h4>
													
                                              
                                            </div>
                                            <div class="col-md-6">
                                               
                                                    <?php echo $datosevaluacion['opcion2']; ?>
                                                </div>
                                           
                                    </div>
<hr />					
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>T&eacute;cnicas Metodol&oacute;gicas Relator</h4>
													
                                                
                                            </div>
                                            <div class="col-md-6">
                                                
                                                   <?php echo $datosevaluacion['opcion3']; ?>
                                            </div>
                                    </div>
<hr />
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Material / documentaci&oacute;n entregada</h4>
													
                                                
                                            </div>
                                            <div class="col-md-6">
                                               
                                                    <?php echo $datosevaluacion['opcion4']; ?>
                                           
                                            </div>
                                    </div>
<hr />
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Sala</h4>
													
                                                
                                            </div>
                                            <div class="col-md-6">
                                             
                                                    <?php echo $datosevaluacion['opcion5']; ?>
                                                
                                            </div>
                                    </div>
<hr />
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Atenci&oacute;n (del Lugar Realizaci&oacute;n)</h4>
													
                                                
                                            </div>
                                            <div class="col-md-6">
                                                
                                                  <?php echo $datosevaluacion['opcion6']; ?>
                                               
                                            </div>
                                    </div>
<hr />
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Almuerzo (si procede)</h4>
													
                                                
                                            </div>
                                            <div class="col-md-6">
                                               
                                                    <?php echo $datosevaluacion['opcion7']; ?>
                                         
                                            </div>
                                    </div>
<hr />
<div class="row">
                                       <div class="col-md-6">
                                              
                                                    <h4>Audiovisuales</h4>
													
                                              
                                            </div>
                                            <div class="col-md-6">
                                                
                                                  <?php echo $datosevaluacion['opcion8']; ?>
                                               
                                            </div>
                                    </div>
<hr />
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Recepci&oacute;n, registro, credenciales</h4>
													
                                                
                                            </div>
                                            <div class="col-md-6">
                                               
                                                  <?php echo $datosevaluacion['opcion9']; ?>
                                               
                                            </div>
                                    </div>
<hr />
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Atenci&oacute;n Evento (Asistente de Cides)</h4>
												
                                            </div>
                                            <div class="col-md-6">
                                               
                                                   <?php echo $datosevaluacion['opcion10']; ?>
                                               
                                            </div>
                                    </div>
<hr />
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Satisfacci&oacute;n General</h4>
													
                                                
                                            </div>
                                            <div class="col-md-6">
                                                
                                                   <?php echo $datosevaluacion['opcion11']; ?>
                                             
                                            </div>
                                    </div>
<hr />																				
									
                                    <div class="row">
										<div class="col-sm-12 col-lg-12">
                                            <div class="table-responsive">
                                
                            </div>
                                        </div>
                                    </div>
									
                                </div>
                                    </div>
									
                                </div>
								<div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-12">
                                             <div class="form-group">
                                    <label><b>Escriba una frase corta que resuma su opini&oacute;n global del seminario</b></label>
                                    <p><?php echo $datosevaluacion['resumen']; ?></p>
                                </div>
								<div class="form-group">
                                    <label><b>Autorizo a CIDES-CORPOTRAINING a eventualmente publicar mi opini&oacute;n aqu&iacute; entregada:&nbsp;&nbsp;</b></label>
                                   
                                      <?php if($datosevaluacion['opinionsi'] == 1){ ?>  
									  <p>si</p>
									  <?php } else if($datosevaluacion['opinionsi'] == 0){ ?>
                                        <p>no</p>
                                      <?php }  ?>
								<div class="form-group">
                                    <label><b>Agradecer&iacute;amos tambi&eacute;n sus sugerencias, cr&iacute;ticas y/o elogios de cualquier tipo:</b></label>
                                    <p><?php echo $datosevaluacion['sugerenciasycriticas']; ?></p>
                                </div>
								<div class="form-group">
                                    <label><b>Identifique otros temas de Seminarios a los que le interesar&iacute;a asistir</b></label>
                                   <p><?php echo $datosevaluacion['intereses']; ?></p>
                                </div>
                                        </div>
                                    </div>
									</div>
								<hr />
                                <div class="card-body">
                                    <div class="form-group mb-0 text-center">
                                        <a href="home.php" class="btn btn-info btn-lg waves-effect waves-light">Volver al Inicio</a>
                                    </div>
                                </div>
                           
                        </div>
                    </div>
                </div>
				</div>
	<?php include_once('layouts/footer.php'); ?>