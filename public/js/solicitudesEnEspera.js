//const response = document.querySelector('#response');
const botones = document.querySelectorAll("#aceptar");

botones.forEach(boton => {

	boton.addEventListener('click', function(){
		//hacer peticion ajax
		//obtener id del examen a aeliminar
		const idSolicitud = this.dataset.id;

		swal({
		  title: "Desea aceptar esta solicitud?",
		  text: "La solicitud sera aceptada!",
		  type: "info",
		  showCancelButton: true,
		  confirmButtonClass: "btn-primary",
		  confirmButtonText: "Aceptar",
		  closeOnConfirm: false
		},
		function(){
			aceptarSolicitud('../../API/controllers/administrador/updateEstadoExamen.php',idSolicitud,function(){

				//response.innerHTML = this.responseText;

				const tbody = document.querySelector('#tbody-examenes');
				const fila = document.querySelector('#fila-'+idSolicitud);

				tbody.removeChild(fila);
			})
		  swal("Aceptada!", "La solicitud ha sido aceptada.", "success");
		});


		
	})
})


function aceptarSolicitud(url,id,callback){

	http = new XMLHttpRequest();

	//metodo de envio y url
	http.open("POST", url);

	//modificar headers
	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	http.send('idSolicitudExamen='+id);

	http.onreadystatechange = function(){

		if(this.readyState==4 && this.status==200){
			callback.apply(http);
		}
	}
}


