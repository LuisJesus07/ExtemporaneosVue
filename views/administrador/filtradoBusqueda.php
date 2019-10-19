<?php include '../headerAdmin.php' ?>

<?php include '../sidebar.php' ?>

	<!-- MAIN -->
    <div class="col">
    	<div class="col text-center">
		<h1 class="display-4 mt-3">Filtrar Búsqueda</h1>
	    <div class="row principal mx-auto">

	    	<div class="col-md-6">
	    		<div class="pricing-container">
	    			<div class="plans">
	    				<h3>Por Carrera</h3>
	    				<form method="POST" action="examenesPorCarrera.php">

							<select class="form-control" name="carrera">
								<option>Licenciatura en Comunicación</option>
								<option>Licenciatura en Derecho</option>
								<option>Licenciatura en Criminología</option>
								<option>Licenciatura en Ciencias Políticas y Administración Pública</option>
							</select><br>

							<input class="btn btn-success" type="submit" name="" value="Buscar">
						
					</form>
	    			</div>
	    		</div>
	    	</div>

	    	<div class="col-md-6">
	    		<div class="pricing-container">
	    			<div class="plans">
	    				<h3>Por Plan</h3>

	    				<form method="POST" action="examenesPorPlan.php">

							<select class="form-control" name="plan">
								<option>Comunicación 2000</option>
								<option>Comunicación 2010</option>
								<option>Derecho 1993</option>
								<option>Derecho 2012</option>
								<option>Criminología 2018</option>
								<option>CP y AP 1978</option>
								<option>CP y AP 1995</option>
							</select><br>

							<input class="btn btn-success" type="submit" name="" value="Buscar">
						
						</form>
	    			</div>
	    		</div>
	    	</div>

	    	
	    	<div class="col-md-6" id="app">
	    		<div class="pricing-container">
	    			<div class="plans">
	    				<h3>Por Materia</h3>
	    				<form method="POST" action="examenesPorMateria.php">

	    					<label class="display-5">Plan:</label>
							<select class="form-control" @change="getMaterias"name="plan" v-model="idPlan">
								<option value="1">Comunicación 2000</option>
								<option value="2">Comunicación 2010</option>
								<option value="3">Derecho 1993</option>
								<option value="4">Derecho 2012</option>
								<option value="5">Criminología 2018</option>
								<option value="6">CP y AP 1978</option>
								<option value="7">CP y AP 1995</option>
							</select>

							
							<label>Materia: </label>
							<select class="form-control"name="materia" >
								<option v-for="materia in materias">{{materia.nombreMateria}}</option>
							</select><br>
							

							<input class="btn btn-success" type="submit" name="" value="Buscar">
						
						</form>
	    			</div>
	    		</div>
	    	</div>
	    	

	    </div>
	</div>
    </div><!-- Main Col END -->
    
</div><!-- body-row END -->
  
  
</div><!-- container -->

<?php include '../scripts.php' ?>

<script type="text/javascript" src="../../public/js/filtradoBusqueda.js"></script>