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
		respuesta: document.querySelector("#respuesta"),
		correoLogin: '',
		passwordLogin: ''
	},
	methods:{
		insertUsuario: function(){
			axios.post('../../API/controllers/usuario/createUsuario.php',{
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
			  	respuesta.innerHTML = '';
			  	respuesta.classList.remove("error");

			  	//desparecer modal
			  	$('#registrar').fadeOut(300);
			  	$('#oscurecer').fadeOut(300);

			  })
			  .catch(function(error){
			  	var error = error.message;

			  	if(error == "Request failed with status code 400"){
			  		error = "Ingrese todos los datos.";
			  	}

			  	if(error == "Request failed with status code 409"){
			  		error = "El correo que ingreso ya existe.Intenete con otro";
			  	}

			  	if(error == "Request failed with status code 501" ){
			  		error = "El numero de control ya existe.Intente con otro";
			  	}

			  	if(error == "Request failed with status code 406" ){
			  		error = "Ingrese los datos solcitados correctamente";
			  	}
			  	//agregar clase y poner mensaje
			  	respuesta.classList.add("error");
			  	respuesta.innerHTML = error;
			  })
			  .finally(function(){

			  });

		},

		iniciarSesion: function(){

			axios.post('../../API/controllers/login/login.php',{

				correo: app.correoLogin,
				password: app.passwordLogin,
			})
			.then(function(response){
				console.log(response.data);
				const tipoUsuario = response.data;

				if(tipoUsuario == "alumno"){
					location.href = "../alumnos/menuAlumnos.php";
				}

				if(tipoUsuario == "admin"){
					location.href = "../administrador/menuAdmin.php";
				}

				if(tipoUsuario == "error"){
					swal("Error!", "Usuario o contraseña incorrecto.", "warning");
				}
			})
			.catch(function(error){
				console.log(error);
			})
		}
	}
})