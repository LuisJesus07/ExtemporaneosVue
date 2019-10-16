<?php

	include '../../config/database.php';
	include '../../models/alumno.php';

	$database = new Database();
	$db = $database->getConnection();

	$alumno = new Alumno($db);

	$alumno->correo = isset($_POST['correo']) ? $_POST['correo'] : die();


	if($alumno->recuperarPassword()){

		//obtenemos el password
		$password = $alumno->recuperarPassword();

		mail($alumno->correo, "DEPARTAMENTO ACADÉMICO DE CIENCIAS SOCIALES Y JURÍDICAS", "Tu contraseña es: ".$password);

		
		echo 1;
	}else{

		//echo "error al enviar";

		echo 0;
	}

?>