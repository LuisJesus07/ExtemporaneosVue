const app = new Vue({
	el: '#app',
	created: function(){
		this.verificarPeriodo();
	},
	data:{
		materias:[],
		idMateria: '',
		select_materias: document.querySelector('#select_materias')
	},
	methods:{
		getMaterias: function(){
			axios.get('../../API/controllers/alumnos/getMaterias.php')
			.then(function(response){
				//console.log(response.data.materias);
				app.materias = response.data.materias;

			})
			.catch(function(error){
				//console.log(error);
			});
		},
		insertExamen: function(){
			axios.post('../../API/controllers/alumnos/createExamen.php',{
				idMateria: app.idMateria,
			})
			.then(function(response){
				//console.log(response.data);
				swal("Solicitud enviada!", "Solicitud realizada con éxito", "success");
				//console.log(select_materias)
				this.select_materias.selectedIndex = 0
			})
			.catch(function(error){
				//console.log(error.data);
				swal("Error en el servidor!", "No se pudo realizar la solicitud", "error");
			});
		},
		verificarPeriodo: function(){
			axios.get('../../API/controllers/alumnos/verificarPeriodo.php')
			.then(function(response){
				//console.log(response.data.message);
				var estadoPerido = response.data.message;
				//si el periodo esta inactivo muestra  ventana modal
				if(estadoPerido == 2){
					swal({
					  title: "Periodo inactivo",
					  text: "El periodo de solicitudes se encuentra inactivo!",
					  type: "warning",
					  showCancelButton: false,
					  confirmButtonClass: "btn-primary",
					  confirmButtonText: "Aceptar",
					  closeOnConfirm: false
					},
					function(){
					   location.href = "menuAlumnos.php";
					});
	
				}else{
					//si el periodo se encuentra activo cargamos las materias
					app.getMaterias();
				}

				
			})
			.catch(function(error){
				//console.log(error.data);
			});
		}
	}
})