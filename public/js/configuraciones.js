const app = new Vue({
	el: '#app',
	created: function(){
		this.verificarEstado();
	},
	data:{
		estado: ''
	},
	methods:{
		verificarEstado: function(){
			axios.get('../../API/controllers/administrador/getEstadoSolicitudes.php')
			.then(function(response){
				//console.log(response.data.message)
				app.estado = response.data.message;

			})
			.catch(function(error){
				console.log(error.data)
			});
		},
		activarPeriodo: function(){
			axios.get('../../API/controllers/administrador/activarPeriodoSolicitudes.php')
			.then(function(response){
				//console.log(response.data);
				swal("Activado!", "El periodo de solicitudes se encuntra activo.", "success");
				app.verificarEstado();
			})
			.catch(function(error){
				console.log(error.data);
			});
		},
		desactivarPeriodo: function(){
			axios.get('../../API/controllers/administrador/desactivarPeriodoSolicitudes.php')
			.then(function(response){
				//console.log(response.data);
				swal("Deactivado!", "El periodo de solicitudes se encuntra inactivo.", "success");
				app.verificarEstado();
			})
			.catch(function(error){
				console.log(error.data);
			});
		},
		reiniciarCiclo: function(){
			swal({
			  title: "Estas Seguro?",
			  text: "Todos los registros de examenes se borraran!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: "btn-danger",
			  confirmButtonText: "Eliminar",
			  closeOnConfirm: false
			},
			function(){
			  axios.get('../../API/controllers/administrador/reiniciarCiclo.php')
				.then(function(response){
					console.log(response.data);
					swal("Reiniciado!", "El ciclo se ha reiniciado con exito.", "success");
				})
				.catch(function(error){
					console.log(error.data);
				})
			});
		}
	}
})