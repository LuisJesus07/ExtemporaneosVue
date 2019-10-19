<!DOCTYPE html>
<html>
<head>
	<title>Solicitud de exámenes extemporáneos</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />


</head>
<body>

	<div id="app">

		<section class="principal">
			<h1>DEPARTAMENTO ACADÉMICO DE CIENCIAS SOCIALES Y JURÍDICAS</h1>
			<h2>SOLICITUD DE EXÁMENES EXTEMPORÁNEOS</h2>
			<p>Regístrate en la plataforma para realizar tus solicitudes de exámenes extemporáneos, toma en cuenta que por reglamento se tiene derecho a dos exámenes por periodo, a partir de la tercera solicitud serán sujetas a aprobación. </p>
			<a href="" class="bt-home" id="activarLogin"><i class="fas fa-sign-in-alt separar"></i></i>Ingresar</a>
			<a href="" class="bt-home" id="activarRegistro"><i class="fa fa-user-plus separar" aria-hidden="true"></i>
	 		Registrarme</a>
		</section>

		<div class="login" id="login">
			<a href="" class="cerrar" id="cerrar"><i class="fa fa-times" aria-hidden="true"></i></a>
			<form method="POST">
				<input type="text" v-model="correoLogin" require placeholder="Usuario">
				<input type="password" v-model="passwordLogin" require placeholder="Contraseña" >
				<!--<input type="submit" value="Entrar" >-->
				<button @click.prevent="iniciarSesion">Entrar</button>
			</form>
			<a href="#" onclick="aparecerRecuperarPassword()">Olvide mi contraseña</a>
		</div>
		<div class="oscurecer" id="oscurecer"></div>

		<div class="registro-exitoso">
			<img src="../../public/img/correcto.png">
			<label>¡Te haz registrado correctamente!</p></label>
			<button onclick="desparecerExito()">Aceptar</button>
		</div>

		<div class="recuperar-password">
			<div class="cerrarRegistro" onclick="desaparecerRecuperarPassword()">
				x
			</div>
			<img src="../../public/img/icono-password.png">
			<form id="form-recuperar-password">
				<label>Ingresa tu correo electrónico para recuperar tu contraseña.</label>
				<input type="email" id="correo" required>

				<input type="submit" name="" value="Enviar">
				<div id="response-password"></div>
			</form>
		</div>

		<div class="registrar" id="registrar">
			<div class="cerrarRegistro" id="cerrarRegistro">
				x
			</div>
			<h1>Registrarme</h1>
			<form id="form-register" autocomplete="off">
				
				<input type="text" v-model="numControl" id="numControl" placeholder="Numero de Control" required>
				<input type="text" v-model="nombre" id="nombre" placeholder="Nombre(s)" required>
				<input type="text" v-model="apellidoPaterno" id="apellidoP" placeholder="Apellido Paterno" required>
				<input type="text" v-model="apellidoMaterno" id="apellidoM" placeholder="Apellido Materno" required>
				<input type="email" v-model="correo" id="email" placeholder="Correo" required>
				<input type="password" v-model="password" id="password" placeholder="Contraseña" required>
				<label>Plan de Estudio: </label>
				<select v-model="idPlanDeEstudio" id="plan" required>
					<option value="1">Comunicación 2000</option>
					<option value="2">Comunicación 2010</option>
					<option value="3">Derecho 1993</option>
					<option value="4">Derecho 2012</option>
					<option value="5">Criminología 2018</option>
					<option value="6">CP y AP 1978</option>
					<option value="7">CP y AP 1995</option>
				</select>
				<!--<input type="text" v-model="idPlanDeEstudio" name="">-->

				<div id="respuesta"></div>

				<!--<input type="submit" value="Registrarse">-->
				<button @click.prevent="insertUsuario" class="btn btn-success mx-auto">Registrarme</button>
				
			</form>
		</div>

	</div>
	


<!--<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<script type="text/javascript" src="../../public/js/acciones.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../plugins/sweetalert.css">
<script type="text/javascript" src="../../plugins/sweetalert.js"></script>
<script type="text/javascript" src="../../public/js/login.js"></script>
<script type="text/javascript" src="../../public/js/recuperarPassword.js"></script>

</body> 
</html>