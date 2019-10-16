<?php include '../headerAdmin.php' ?>

<?php include '../../API/config/database.php'?>
<?php include '../../API/models/administrador.php'?>
<?php include '../../API/controllers/administrador/getExamenesByMateria.php'?>

	<!-- MAIN -->
    <div class="col">
		<div class="card">
			<div class="card-header text-center" style="background-color: #132644;">
				<h2 class="display-4">Examenes Por Plan</h2>
			</div>
			<div class="card-body">
				<table class="table table-hover table-bordered mt-2" id="tabla">
		            <thead class="thead-light">
		                <tr>
		                    <th class="text-secondary">Número de control</th>
		                    <th class="text-secondary">Nombre</th>
		                    <th class="text-secondary">Apellido Paterno</th>
		                    <th class="text-secondary">Apellido Materno</th>
		                    <th class="text-secondary">Plan</th>
		                    <th class="text-secondary">Carrera</th>
		                    <th class="text-secondary">Materia</th>
		                </tr> 
		            </thead>
		            <tbody id="tbody-examenes">
		            	<?php foreach($examenes['examenes'] as $examen){ ?>
						<tr>
							<td><?php echo $examen['numControl'] ?></td>
							<td><?php echo $examen['nombre'] ?></td>
							<td><?php echo $examen['apellidoPaterno'] ?></td>
							<td><?php echo $examen['apellidoMaterno'] ?></td>
							<td><?php echo $examen['nombrePlan'] ?></td>
							<td><?php echo $examen['nombreCarrera'] ?></td>
							<td><?php echo $examen['nombreMateria'] ?></td>	
						</tr>
						<?php } ?>
					
		            </tbody>
		        </table>
	        </div>
        </div>

	</div>





<link rel="stylesheet" type="text/css" href="../../plugins/sweetalert.css">
<script type="text/javascript" src="../../plugins/sweetalert.js"></script>
<script type="text/javascript" src="../../public/js/solicitudesEnEspera.js"></script>
<script type="text/javascript" src="../../public/js/buttons/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../../public/js/buttons/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../public/js/buttons/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../../public/js/buttons/jszip.min.js"></script>
<script type="text/javascript" src="../../public/js/buttons/vfs_fonts.js"></script>
<script type="text/javascript" src="../../public/js/buttons/buttons.print.min.js"></script>
<script type="text/javascript" src="../../public/js/buttons/buttons.html5.min.js"></script>

<script type="text/javascript" src="../../public/js/generarExcel.js"></script>