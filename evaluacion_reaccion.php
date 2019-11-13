<?php
  $page_title = 'Agregar Cliente';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
    $user = current_user();
 if(empty($session->getCursoId()))
 {
 $session->setCurso(current_user_curso($user['rut']));
 }
 
$id_curso = $session->getCursoId();
$datoscurso = find_by_sql_assoc("SELECT * FROM `confirmados` tcp join material_curso mc on (tcp.id_seminario = mc.id_curso)  LEFT JOIN relator_aula_virtual rav on (tcp.REL1 = rav.cod_relator)  where tcp.id_seminario = $id_curso"); 
$estado_usuario = find_by_sql_assoc("SELECT * FROM  matriculas where id_curso = $id_curso"); 
  $rut = $user['rut'];
 $datosparticipante = find_by_sql_assoc("SELECT * FROM `participante` p  where rut =  '$rut'");
 
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
                        <h5 class="font-medium text-uppercase mb-0">Encuesta de Satisfacción</h5>
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
						 <div class="card-body">
								

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
									
									
                                </div>
                             
                            
                           
                            <form class="form-horizontal" action="evaluacion_reaccion_guardar.php" method="post">
							<input type="hidden" name="id_curso" value="<?php echo $id_curso; ?>">
							<input type="hidden" name="id_usuario" value="<?php echo $user['id']; ?>">
							 <input type="hidden" name="id_participante" value="<?php echo $datosparticipante['id']; ?>">
                               
                                <div class="card-body">
                                    <h4 class="card-title">¡Nos encantaría conocer tu opinión!<br />

Porfavor completa esta breve encuesta, tus respuestas son muy valiosas para mejorar continuamente nuestros servicios.<br />

Muchas gracias! </h4>

<div class="row">
                                       <div class="col-md-12">
                                                
                                                   &nbsp;&nbsp;&nbsp; <h4>Favor dar las puntuaciones que le parezcan más apropiadas, Ingrese la nota correspondiente de 1 a 10 Donde 10 es Excelente y 1 es Deficiente</h4>
													
                                          
                                            </div>
                                            
                                    </div>				
<hr />				
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Contenido del Curso</h4>
													
                                                
                                            </div>
                                            <div class="col-md-6">
                                                
                                                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-default">
    <input type="radio" name="options1" id="option1" value="10" autocomplete="off">EXELENTE
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options1" id="option2" value="8" autocomplete="off">BUENO
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options1" id="option3" value="5" autocomplete="off">REGULAR
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options1" id="option4" value="2" autocomplete="off">DEFICIENTE
  </label>
</div>
                                               
                                            </div>
                                    </div>
<hr />			
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Conocimientos Relator</h4>
													
                                              
                                            </div>
                                            <div class="col-md-6">
                                               
                                                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-default">
    <input type="radio" name="options2" id="option1" value="10" autocomplete="off">EXELENTE
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options2" id="option2" value="8" autocomplete="off">BUENO
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options2" id="option3" value="5" autocomplete="off">REGULAR
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options2" id="option4" value="2" autocomplete="off">DEFICIENTE
  </label>
</div>
                                                </div>
                                           
                                    </div>
<hr />					
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Técnicas Metodológicas Relator</h4>
													
                                                
                                            </div>
                                            <div class="col-md-6">
                                                
                                                    <div class="btn-group" data-toggle="buttons">
 <label class="btn btn-default">
    <input type="radio" name="options3" id="option1" value="10" autocomplete="off">EXELENTE
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options3" id="option2" value="8" autocomplete="off">BUENO
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options3" id="option3" value="5" autocomplete="off">REGULAR
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options3" id="option4" value="2" autocomplete="off">DEFICIENTE
  </label>
</div>
                                            </div>
                                    </div>
<hr />
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Material / documentación entregada</h4>
													
                                                
                                            </div>
                                            <div class="col-md-6">
                                               
                                                    <div class="btn-group" data-toggle="buttons">
 <label class="btn btn-default">
    <input type="radio" name="options4" id="option1" value="10" autocomplete="off">EXELENTE
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options4" id="option2" value="8" autocomplete="off">BUENO
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options4" id="option3" value="5" autocomplete="off">REGULAR
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options4" id="option4" value="2" autocomplete="off">DEFICIENTE
  </label>
</div>
                                           
                                            </div>
                                    </div>
<hr />
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Sala</h4>
													
                                                
                                            </div>
                                            <div class="col-md-6">
                                             
                                                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-default">
    <input type="radio" name="options5" id="option1" value="10" autocomplete="off">EXELENTE
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options5" id="option2" value="8" autocomplete="off">BUENO
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options5" id="option3" value="5" autocomplete="off">REGULAR
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options5" id="option4" value="2" autocomplete="off">DEFICIENTE
  </label>
</div>
                                                
                                            </div>
                                    </div>
<hr />
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Atención (del Lugar Realización)</h4>
													
                                                
                                            </div>
                                            <div class="col-md-6">
                                                
                                                    <div class="btn-group" data-toggle="buttons">
<label class="btn btn-default">
    <input type="radio" name="options6" id="option1" value="10" autocomplete="off">EXELENTE
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options6" id="option2" value="8" autocomplete="off">BUENO
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options6" id="option3" value="5" autocomplete="off">REGULAR
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options6" id="option4" value="2" autocomplete="off">DEFICIENTE
  </label>
</div>
                                               
                                            </div>
                                    </div>
<hr />
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Almuerzo (si procede)</h4>
													
                                                
                                            </div>
                                            <div class="col-md-6">
                                               
                                                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-default">
    <input type="radio" name="options7" id="option1" value="10" autocomplete="off">EXELENTE
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options7" id="option2" value="8" autocomplete="off">BUENO
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options7" id="option3" value="5" autocomplete="off">REGULAR
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options7" id="option4" value="2" autocomplete="off">DEFICIENTE
  </label>
</div>
                                         
                                            </div>
                                    </div>
<hr />
<div class="row">
                                       <div class="col-md-6">
                                              
                                                    <h4>Audiovisuales</h4>
													
                                              
                                            </div>
                                            <div class="col-md-6">
                                                
                                                    <div class="btn-group" data-toggle="buttons">
 <label class="btn btn-default">
    <input type="radio" name="options8" id="option8" value="10" autocomplete="off">EXELENTE
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options8" id="option8" value="8" autocomplete="off">BUENO
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options8" id="option8" value="5" autocomplete="off">REGULAR
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options8" id="option8" value="2" autocomplete="off">DEFICIENTE
  </label>
</div>
                                               
                                            </div>
                                    </div>
<hr />
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Recepción, registro, credenciales</h4>
													
                                                
                                            </div>
                                            <div class="col-md-6">
                                               
                                                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-default">
    <input type="radio" name="options9" id="option1" value="10" autocomplete="off">EXELENTE
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options9" id="option2" value="8" autocomplete="off">BUENO
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options9" id="option3" value="5" autocomplete="off">REGULAR
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options9" id="option4" value="2" autocomplete="off">DEFICIENTE
  </label>
</div>
                                               
                                            </div>
                                    </div>
<hr />
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Atención Evento (Asistente de Cides)</h4>
												
                                            </div>
                                            <div class="col-md-6">
                                               
                                                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-default">
    <input type="radio" name="options10" id="option1" value="10" autocomplete="off">EXELENTE
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options10" id="option2" value="8" autocomplete="off">BUENO
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options10" id="option3" value="5" autocomplete="off">REGULAR
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options10" id="option4" value="2" autocomplete="off">DEFICIENTE
  </label>
</div>
                                               
                                            </div>
                                    </div>
<hr />
<div class="row">
                                       <div class="col-md-6">
                                                
                                                    <h4>Satisfacción General</h4>
													
                                                
                                            </div>
                                            <div class="col-md-6">
                                                
                                                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-default">
    <input type="radio" name="options11" id="option1" value="10" autocomplete="off">EXELENTE
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options11" id="option2" value="8" autocomplete="off">BUENO
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options11" id="option3" value="5" autocomplete="off">REGULAR
  </label>
  <label class="btn btn-default">
    <input type="radio" name="options11" id="option4" value="2" autocomplete="off">DEFICIENTE
  </label>
</div>
                                             
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
								<div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-12">
                                             
                                    <label>Escriba una frase corta que resuma su opinión global del seminario</label>
                                    <textarea class="form-control" rows="5" name="resumen"></textarea>
                                
						
                                    <label>Autorizo a CIDES-CORPOTRAINING a eventualmente publicar mi opinión aquí entregada:&nbsp;&nbsp;</label>
                                    <label for="radio1">
                                        si&nbsp;<input type="radio" name="opinionsi"  value="1"></label>&nbsp;&nbsp;<label for="radio1">
                                        no&nbsp;<input type="radio" name="opinionsi"  value="0"></label>
                                  
								
                                    <label>Agradeceríamos también sus sugerencias, críticas y/o elogios de cualquier tipo:</label>
                                    <textarea class="form-control" rows="5" name="sugerenciasycriticas"></textarea>
                                
                                    <label>Identifique otros temas de Seminarios a los que le interesaría asistir</label>
                                    <textarea class="form-control" rows="5" name="intereses"></textarea>
                                
                                        </div>
                                    </div>
									</div>
								<hr />
                                <div class="card-body">
                                    <div class="form-group mb-0 text-center">
                                        <button type="submit" class="btn btn-info btn-lg waves-effect waves-light">Enviar Encuesta</button>
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
