<?php include '../headerAlumnos.php' ?>


<?php include '../sidebar.php' ?>

<!-- MAIN -->
    <div class="col">

    	<div id="app">
		    <div class="container mt-5">
		        <div class="row">
		            <div class="col-md-11">
		                <h1 class="h1 text-center">Solicitud De Exámenes Extemporáneos</h1>
		                <form method="POST">
		                    <div class="card mt-4">
		                        <div class="card card-body">
		                            <label for="" class="text-secondary mt-3">Materia:</label>
		                            <select name="idMateria" v-model="idMateria" class="form-control" required >
		                            	
		                            	<option v-for="materia in materias" :value="materia.idMateria">{{materia.nombreMateria}}</option>

		                            </select>
		                        </div>
		                        
		                    </div>
		                    <div class="alert alert-warning mt-4" role="alert">
		                        <img src="../../public/img/alerta.png" width="25">
		                        A partir de la tercera solicitud seran sometidas a revisión para su autorización.
		                    </div>
		                    <!--<input type="submit" name="" class="btn btn-primary btn-block" value="Enviar">-->
		                    <button class="btn btn-primary btn-block" @click.prevent="insertExamen()">Enviar</button>
		                </form>
		                
		            </div>
		        </div>
		    </div>
        </div>

    </div><!-- Main Col END -->
    
</div><!-- body-row END -->
  
  
</div><!-- container -->

<?php include '../scripts.php' ?>
<script type="text/javascript" src="../../public/js/vueJs/solicitarExamen.js"></script>