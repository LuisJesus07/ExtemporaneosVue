const btnEstadoPeriodo = document.querySelector('.btn-estado-periodo');
var response = document.querySelector('#response');

const h4 = document.querySelector('.alert');
const btn = document.querySelector('.btn');


btnEstadoPeriodo.addEventListener("click", function(){
	//alert("Cambiar Estado periodo");
	httpRequestPeriodo("estadoPeriodo_back.php",2,function(){

		//guardamos la respuesta del servidor
		response = this.responseText;

		// si el periodo se activa cambiamos los elementos del html
		if(response == "Periodo activado"){
			//cambiar h4
			h4.innerHTML = "Estado Actual : Activo";
			h4.classList.remove('alert-warning');
			h4.classList.add('alert-success');

			//cambiar btn
			btn.innerHTML = "Desactivar";
			btn.classList.remove('btn-success');
			btn.classList.add('btn-danger');

			swal("Periodo Activado!", "El periodo de solicitudes esta activo", "success");

		}else{
			if (response == "Perido desactivado") {
				//cambiar h4
				h4.innerHTML = "Estado Actual : Inactivo";
				h4.classList.remove('alert-success');
				h4.classList.add('alert-warning');

				//cambiar btn
				btn.innerHTML = "Activar";
				btn.classList.remove('btn-danger');
				btn.classList.add('btn-success');

				swal("Periodo Desactivado!", "El periodo de solicitudes esta inactivo", "success")
			}
		}
		

	})
})


function httpRequestPeriodo(url,estado, callback){
	//crear el objeto http
	http = new XMLHttpRequest();

	//se define el metodo de envio y la url que se va a cargar
	http.open("POST", url);

	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	//mandamos la solicitud
	http.send('estado='+estado);

	// validar que la solicitud http funciono correctamete 
	http.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){
			//mandamos la respuesta atravez de la variable callback con el parametro
			callback.apply(http);
		}


	}

}
