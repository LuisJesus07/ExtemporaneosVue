 const app = new Vue({
	el: '#app',
	data:{
		numControl: '',
		nombre: '',
		apellidoPaterno: '',
		apellidoMaterno: '',
		correo: '',  
		password: '',
		idPlanDeEstudio: '',
		respuesta: document.querySelector("#respuesta")
	},
	methods:{
		insertUsuario: function(){
			axios.post('http://localhost/ExtemporaneosVue/API/controllers/usuario/createUsuario.php',{
				numControl: app.numControl,
				nombre: app.nombre,
				apellidoPaterno: app.apellidoPaterno,
				apellidoMaterno: app.apellidoMaterno,
				correo: app.correo,
				password: app.password,
				idPlanDeEstudio: app.idPlanDeEstudio,
			})
			  .then(function(response){
			  	//console.log(response.data.message);
			  	swal("Registrado!", "Registro completado con exito.", "success");

			  	//limpiar inputs
			  	app.numControl = '';
			  	app.nombre = '';
			  	app.apellidoPaterno = '';
			  	app.apellidoMaterno = '';
			  	app.correo = '';
			  	app.password = '';

			  	//desparecer modal
			  	$('#registrar').fadeOut(300);
			  	$('#oscurecer').fadeOut(300);

			  })
			  .catch(function(error){
			  	var error = error.message;

			  	if(error == "Request failed with status code 409"){
			  		error = "El correo que ingreso ya existe.Intenete con otro";
			  	}

			  	if(error == "Request failed with status code 501" ){
			  		error = "El numero de control ya existe.Intente con otro";
			  	}
			  	//agregar clase y poner mensaje
			  	respuesta.classList.add("error");
			  	respuesta.innerHTML = error;
			  })
			  .finally(function(){

			  });

		}
	}
})