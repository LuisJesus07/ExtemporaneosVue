const botones = document.querySelectorAll('.btn-eliminar');



botones.forEach(boton => {

	boton.addEventListener("click", function(){

		const idSolicitudExamen = this.dataset.idsolicitud;

		//console.log(matricula);

		const confirm = window.confirm("Desea aceptar este examen?");

		if(confirm){
			//ejecutamos AJAX

			httpRequest("aceptarSolicitud_back.php",idSolicitudExamen, function(){

				//agregar clase de mensaje exito
				document.querySelector("#respuesta").classList.add("alert");
				document.querySelector("#respuesta").classList.add("alert-success");

				document.querySelector("#respuesta").innerHTML = this.responseText;
				
				const tbody = document.querySelector('#tbody-examenes');
				const fila = document.querySelector('#fila-'+idSolicitudExamen);

				tbody.removeChild(fila); 

			});
		}


	});


});


function httpRequest(url,idSolicitudExamen, callback){
	//crear el objeto http
	http = new XMLHttpRequest();

	//se define el metodo de envio y la url que se va a cargar
	http.open("POST", url);

	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	//mandamos la solicitud
	http.send('idSolicitudExamen='+idSolicitudExamen);

	// validar que la solicitud http funciono correctamete 
	http.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){
			//mandamos la respuesta atravez de la variable callback con el parametro
			callback.apply(http);
		}


	}


}