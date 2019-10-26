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
				//console.log(error.data)
			});
		},
		activarPeriodo: function(){
			axios.get('../../API/controllers/administrador/activarPeriodoSolicitudes.php')
			.then(function(response){
				//console.log(response.data);
				swal("Activado!", "El período de solicitudes se encuentra activo.", "success");
				app.verificarEstado();
			})
			.catch(function(error){
				//console.log(error.data);
			});
		},
		desactivarPeriodo: function(){
			axios.get('../../API/controllers/administrador/desactivarPeriodoSolicitudes.php')
			.then(function(response){
				//console.log(response.data);
				swal("Desactivado!", "El período de solicitudes se encuentra inactivo.", "success");
				app.verificarEstado();
			})
			.catch(function(error){
				//console.log(error.data);
			});
		},
		reiniciarCiclo: function(){
			swal({
			  title: "Estas Seguro?",
			  text: "Todos los registros de exámenes se borrarán!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: "btn-danger",
			  confirmButtonText: "Eliminar",
			  closeOnConfirm: false
			},
			function(){
			  axios.get('../../API/controllers/administrador/reiniciarCiclo.php')
				.then(function(response){
					//console.log(response.data);
					swal("Reiniciado!", "El ciclo se ha reiniciado con éxito.", "success");
				})
				.catch(function(error){
					//console.log(error.data);
				})
			});
		}
	}
})