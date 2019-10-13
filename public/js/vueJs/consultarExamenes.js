const app = new Vue({
	el: '#app',
	created: function(){
		this.getExamenes()
	},
	data: {
		examenes: []
	},
	methods:{
		getExamenes: function(){
			axios.get('http://localhost/ExtemporaneosVue/API/controllers/alumnos/getExamenes.php')
			.then(function(response){
				console.log(response.data.examenes);
				app.examenes = response.data.examenes;
			})
			.catch(function(error){
				console.log(error);
			});
		},
		eliminarSolicitud: function(idsolicitud){

			swal({
			  title: "Estas seguro?",
			  text: "Esta solicitud se eliminara!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: "btn-danger",
			  confirmButtonText: "Eliminar!",
			  closeOnConfirm: false
			},
			function(){
				axios.delete('http://localhost/ExtemporaneosVue/API/controllers/alumnos/deleteExamen.php?idSolicitudExamen='+idsolicitud)
				.then(function(response){
					console.log(response.data);
					swal("Eliminada!", "La solicitud ha sido eliminada", "success");
					app.getExamenes();
				})
				.catch(function(error){

				});
			});
			
		}
	}
})