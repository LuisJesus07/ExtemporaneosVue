<?php include '../headerAdmin.php' ?>

<?php include '../sidebar.php' ?>

	<!-- MAIN -->
	
    <div class="col">
    	<div class="col text-center">
		<h1 class="display-4 mt-3">Configuraciones</h1>

		<div id="app">
			<div class="row principal mx-auto">
			    <div class="col-md-6">

			    	<div class="card card-config mt-3 shadow">
			    		<div class="card-header" style="background-color: #132644;">
			    			<h3>Periodo de solicitudes</h3>
			    		</div>
			    		<div class="card-body">
			    			<p>Cuando el periodo este activo, los alumnos podrán realizar las solicitudes de exámenes, en caso de no estarlo, las solicitudes no serán registradas.</p>

			    				<div v-if="estado == 'activo'">
				    				<h4 class="alert alert-success">Estado Actual : Activo</h4>

				    				<button class="btn mx-auto mt-3 btn-danger btn-lg btn-estado-periodo" @click.prevent="desactivarPeriodo">Desactivar</button>
			    				</div>
			    				<div v-else>
				    				<h4 class="alert alert-warning">Estado Actual : Inactivo</h4>

				    				<button class="btn mx-auto mt-3 btn-success btn-lg btn-estado-periodo" @click.prevent="activarPeriodo">Activar</button>
			    				</div>
			    				

			    			<div id="response"></div>
			    		
			    		</div>
			    	</div>
			    </div>

			    <div class="col-md-6">

			    	<div class="card card-config mt-3 shadow">
			    		<div class="card-header" style="background-color: #f8d7da; color: #721c24;">
			    			<h3>Reiniciar ciclo de extemporáneos</h3>
			    		</div>
			    		<div class="card-body">
			    			<p>Al reiniciar el ciclo de extemporáneos se borraran todos los registros de exámenes actuales, por lo que solo se debe de reiniciar una vez concluido el período de solicitudes.</p>

			    			<button class="btn mx-auto mt-3 btn-outline-danger btn-lg btn-reiniciar" @click.prevent="reiniciarCiclo">Reiniciar</button>
			    		</div>
			    	</div>
			    </div>
			</div>
		</div>

	</div>
    </div><!-- Main Col END -->
    
</div><!-- body-row END -->
  
  
</div><!-- container -->


<?php include '../scripts.php' ?>
<script type="text/javascript" src="../../public/js/configuraciones.js"></script>