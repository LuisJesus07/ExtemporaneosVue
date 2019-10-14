<?php include '../headerAdmin.php' ?>



	<!-- MAIN -->
	<div id="app">
	    <div class="col">
			<div class="card">
				<div class="card-header text-center" style="background-color: #132644;">
					<h2 class="display-4">Solicitudes En Espera</h2>
				</div>
				<div class="card-body">
					<div id="respuesta"></div>
					<table class="table table-hover table-bordered mt-2" id="tabla">
			            <thead class="thead-light">
			                <tr>
			                    <th class="text-secondary">Número de control</th>
			                    <th class="text-secondary">Nombre</th>
			                    <th class="text-secondary">Apellido Paterno</th>
			                    <th class="text-secondary">Apellido Materno</th>
			                    <th class="text-secondary">Carrera</th>
			                    <th class="text-secondary">Plan</th>
			                    <th class="text-secondary">Materia</th>
			                    <th class="text-secondary">Estado</th>
			                    <th class="text-secondary">Aceptar</th>
			                </tr> 
			            </thead>
			            <tbody id="tbody-examenes">
							<tr v-for="examen in examenes" class="pendiente">
								<td>{{examen.numControl}}</td>
								<td>{{examen.nombre}}</td>
								<td>{{examen.apellidoPaterno}}</td>
								<td>{{examen.apellidoMaterno}}</td>
								<td>{{examen.nombreCarrera}}</td>
								<td>{{examen.nombrePlan}}</td>
								<td>{{examen.nombreMateria}}</td>				
								<td>Espera</td>
								<td><button @click.prevent="updateEstadoExamen(examen.idSolicitudExamen)">Aceptar</button></td>
							</tr>
							
						
			            </tbody>
			        </table>
		        </div>
	        </div>

		</div>
	</div>

    


<?php include '../scripts.php' ?>
<script type="text/javascript" src="../../public/js/solicitudesEnEspera.js"></script>