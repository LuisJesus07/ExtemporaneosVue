const app = new Vue({
	el: '#app',
	created: function(){
		this.getExamenes();
	},
	data:{
		examenes: []
	},
	methods:{
		getExamenes: function(){
			axios.get('../../API/controllers/administrador/getExamenesEnEspera.php')
			.then(function(response){
				//console.log(response.data.examenes)
				app.examenes = response.data.examenes;
			})
			.catch(function(error){
				console.log(error.data)
			});
		},

		updateEstadoExamen: function(idSolicitudExamen){
			swal({
			  title: "Desea aceptar esta solicitud?",
			  text: "La solicitud de este examen sera aprobada",
			  type: "info",
			  showCancelButton: true,
			  confirmButtonClass: "btn-primary",
			  confirmButtonText: "Aceptar!",
			  closeOnConfirm: false
			},
			function(){

				axios.get('../../API/controllers/administrador/updateEstadoExamen.php?idSolicitudExamen='+idSolicitudExamen)
				.then(function(response){
					swal("Aceptada!", "La solicitu ha sido aceptada.", "success");
					app.getExamenes();
				})
				.catch(function(error){

				});
			  
			});
		}
	}
})