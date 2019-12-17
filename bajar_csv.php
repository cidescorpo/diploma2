<?php
  $page_title = 'Lista de productos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $user = current_user();
  //$products = join_product_table();
    if(isset($_GET['id']))
  {
  $id_curso = $_GET['id'];
  //$inscripciones = find_by_sql("SELECT p.id,nombres,apellidos,rut, email, cargo, telefono, p.id_curso, id_matricula,razonsocial FROM `participante` p join registro_usuario ru on (p.id_inscripcion = ru.id) left join matriculas m on (p.id = m.id_participante) where p.id_curso  = $id_curso");
  
  $curso = find_by_sql("SELECT * from confirmados c LEFT JOIN material_curso mc on (c.id_seminario = mc.id_curso) where id_seminario =  $id_curso");
 }
  
 
  
?>
<?php include_once('layouts/header.php'); ?>
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
                        <h5 class="font-medium text-uppercase mb-0">Bajar Csv</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            
                        </nav>
                    </div>
                </div>
            </div>
			
  <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
			  	<div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
	 </div>
			    <div class="row">                        
                                                            <div class="col-12">
                                                                <div class="material-card card">
                                                                    <div class="card-body">
                                                                       
																	   
																	    
                  		<div class="list-group">
						 <a class="list-group-item list-group-item-action list-group-item-primary" href="csv_registro.php" >Csv Registros</a><br />
						 <a class="list-group-item list-group-item-action list-group-item-primary" href="csv_participantes.php" >Csv Participantes</a><br />
						 <a  class="list-group-item list-group-item-action list-group-item-primary" href="csv_ficha_participantes.php" >Csv Ficha</a><br />
						 <a  class="list-group-item list-group-item-action list-group-item-primary" href="csv_encuesta_reaccion.php" >Csv Encuesta Reacci&oacute;n</a><br />
						 </div>
                    

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
			
                
	
				
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script language="javascript">
  $(document).ready(function(){
  $('#tienematerial').on('change',function(){
    if (this.checked) {
     $("#paraemail").hide();
    } else {
     $("#paraemail").show();
    }  
  })
});
  </script>
  <?php include_once('layouts/footer.php'); ?>
