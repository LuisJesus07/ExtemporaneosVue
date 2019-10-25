<?php include '../headerAlumnos.php' ?>


<?php include '../sidebar.php' ?>

<!-- MAIN -->
    <div class="col">

    	<div id="app">
    		<div class="card"> 
    			<div class="card-header text-center" style="background-color: #132644;">
					<h2 class="display-4">Solicitar Exámen</h2>
				</div>
				<div class="card-body">
				    <div class="container mt-2">
				        <div class="row">
				            <div class="col-md-12">
				                <form method="POST">
				                    <div class="card mt-4">
				                        <div class="card card-body">
				                            <label for="" class="text-secondary mt-3">Materia:</label>
				                            <select name="idMateria" v-model="idMateria" class="form-control shadow-sm" required >
				                            	
				                            	<option v-for="materia in materias" :value="materia.idMateria">{{materia.nombreMateria}}</option>

				                            </select>
				                        </div>
				                        
				                    </div>
				                    <div class="alert alert-warning mt-3" role="alert">
				                        <img src="../../public/img/alerta.png" width="25">
				                        A partir de la tercera solicitud serán sometidas a revisión para su autorización.
				                    </div>
				                    <!--<input type="submit" name="" class="btn btn-primary btn-block" value="Enviar">-->
				                    <button class="btn btn-success float-right" @click.prevent="insertExamen()">Enviar</button>
				                </form>
				                
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
<script type="text/javascript" src="../../public/js/solicitarExamen.js"></script>