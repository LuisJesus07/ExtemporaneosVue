<?php include '../headerAlumnos.php' ?>

<?php include '../sidebar.php' ?>

<!-- MAIN -->
    <div class="col">

    	<div id="app">
	    	<div class="card">
				<div class="card-header text-center" style="background-color: #132644;">
					<h2 class="display-4">Mis Exámenes</h2>
				</div>
				<div class="card-body">
					<div id="respuesta"></div>
					<table class="table table-hover shadow p-3 mb-5 bg-white rounded table-bordered mt-2" id="tabla">
			            <thead class="thead-light">
			                <tr class="">
			                    <th class="text-secondary">Número de control</th>
			                    <th class="text-secondary">Plan</th>
			                    <th class="text-secondary">Materia</th>
			                    <th class="text-secondary">Estado</th>
			                    <th class="text-secondary">Eliminar</th>
			                </tr> 
			            </thead>
			            <tbody id="tbody-examenes">
							<tr v-for="examen in examenes" v-bind:class="{pendiente: examen.estado == 2}">
								<td>{{ examen.numControl }}</td>
								<td>{{ examen.plan }}</td>
								<td>{{ examen.materia }}</td>
								<td v-if="examen.estado==1">Aceptado</td>
								<td v-else>Espera</td>
								<td><a class="btn-eliminar" @click.prevent="eliminarSolicitud(examen.idSolicitudExamen)"><i class="fas fa-trash-alt"></i></a></td>
							</tr>
			            </tbody>
			        </table>
		        </div>
	        </div>
        </div>

    </div><!-- Main Col END -->
    
</div><!-- body-row END -->
  
  
</div><!-- container -->
<?php include '../scripts.php' ?>
<script type="text/javascript" src="../../public/js/consultarExamenes.js"></script>