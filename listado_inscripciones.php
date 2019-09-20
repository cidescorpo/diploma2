<?php
  $page_title = 'Lista de productos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
    $user = current_user();
  //$products = join_product_table();
    if(isset($_GET['id']))
  {
  $id = $_GET['id'];
  $inscripciones = find_by_sql("SELECT r.id, r.fecha_ingreso, razonsocial, nombre_r,apellidos_r,email_r,telefono_r,seminario  FROM `registro_usuario`  r join tb_cursos_programados tb on (r.id_curso = tb.identificador) where r.id_curso = $id order by fecha_ingreso");
  }
  else{
  $inscripciones = find_by_sql("SELECT r.id, r.fecha_ingreso, razonsocial, nombre_r,apellidos_r,email_r,telefono_r,seminario  FROM `registro_usuario`  r join tb_cursos_programados tb on (r.id_curso = tb.identificador) order by fecha_ingreso");
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
                        <h5 class="font-medium text-uppercase mb-0">Listado Incripciones</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Starter Page</li>
                            </ol>
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
                                                            <div class="col-12">
                                                                <div class="material-card card">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Zero Configuration</h4>
                                                                        <h6 class="card-subtitle">DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function:<code> $().DataTable();</code>. You can refer full documentation from here <a href="https://datatables.net/">Datatables</a></h6> 
                                                                        <div class="table-responsive">
                                                                            <table id="zero_config" class="table table-striped border">
                                                                                <thead>
                                                                                    <tr>
																					    <th>C&oacute;digo</th>
                                                                                        <th>Empresa</th>
                                                                                        <th>Responsable Inscripción</th>
                                                                                        <th>Email</th>
                                                                                        <th>Telefono</th>
																						<th>Curso</th>
																						<th>Fecha Ingreso</th>
																						<th>Participantes</th>
                                                                                        
                                                                                    </tr>
                                                                                </thead>
                                                                                
                                                                                <tbody>
																				<?php foreach ($inscripciones as $inscripcion):
																				 $id = $inscripcion['id']; 
																				$numeroparticipantes = count(find_by_sql("SELECT * FROM `participante` where id_inscripcion = $id"));
																				?>
                                                                                    <tr>
                                                   
																					    <td><a href="incripcion_detalle.php?id=<?php echo $inscripcion['id']; ?>"><?php echo $inscripcion['id']; ?></a></td>
                                                                                        <td><?php echo $inscripcion['razonsocial']; ?></td>
                                                                                        <td><?php echo $inscripcion['nombre_r'].' '.$inscripcion['apellidos_r']; ?></td>
                                                                                        <td><?php echo $inscripcion['email_r']; ?></td>
																						<td><?php echo $inscripcion['telefono_r']; ?></td>
																						<td><?php echo $inscripcion['seminario']; ?></td>
																						<td><?php echo $inscripcion['fecha_ingreso']; ?></td>
																						<td><?php echo $numeroparticipantes; ?></td>
                                                                                        
                                                                                    </tr>
																					<?php endforeach; ?>
																					</tbody>
                                                                            </table>
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

  <?php include_once('layouts/footer.php'); ?>
