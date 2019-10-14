<?php include '../headerAdmin.php' ?>

<?php include '../sidebar.php' ?>

	<!-- MAIN -->
    <div class="col">
    	<div class="col text-center">
			<h1 class="display-4 mt-3">Administrador</h1>
		    <div class="row principal mx-auto">

		    	<div class="col-md-6 mx-auto">
		    		<div class="pricing-container">
		    			<div class="plans">
		    				<h3>Ver Solicitudes</h3>
		    				<img class="d-block mx-auto img" src="../../public/img/consultarExamenes.png">
		    				<a href="filtradoBusqueda.php" class="btn mx-auto mt-3 btn-primary btn-lg">Ver</a>
		    			</div>
		    		</div>
		    	</div>

		    	<div class="col-md-6">
		    		<div class="pricing-container">
		    			<div class="plans">
		    				<h3>Aceptar Solicitudes</h3>
		    				<img class="d-block mx-auto img" src="../../public/img/solicitar.png">
		    				<a href="solicitudesEnEspera.php" class="btn mx-auto mt-3 btn-primary btn-lg">Ver</a>
		    			</div>
		    		</div>
		    	</div>

		    	<div class="col-md-6">
		    		<div class="pricing-container">
		    			<div class="plans">
		    				<h3>Configuraciones</h3>
		    				<img class="d-block mx-auto img" src="../../public/img/config.png">
		    				<a href="consultarExamenes.php" class="btn mx-auto mt-3 btn-primary btn-lg">Ver</a>
		    			</div>
		    		</div>
		    	</div>

		    </div>
		</div>
    </div><!-- Main Col END -->
    
</div><!-- body-row END -->
  
  
</div><!-- container -->


<?php include '../scripts.php' ?>