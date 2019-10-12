<?php
	header("Access-Control-Allow-Origin: *");//cuañquiera tiene acceso
	header("Content-Type: aplication/json; charset=UTF-8");
	header("Access-Control-Allow-Origin: POST");

	include '../../config/database.php';
	include '../../models/login.php';

	$database = new Database();
	$db = $database->getConnection();

	$login = new Login($db); 

	//obtener lod datos enviados
	$data = json_decode(file_get_contents("php://input"));

	if(
		!empty($data->correo) &&
		!empty($data->password)
	){


		$login->correo = $data->correo;
		$login->password = $data->password;


		if($login->iniciarSesion() == 2){

			echo "alumno";
			//header("location:../../views/alumnos/menuAlumnos.php");//Redirigimos la pagina si es que el usuario existe en la BD al inicio
		}else{
			if($login->iniciarSesion() == 1){
				echo "admin";
			}else{

				echo "error";
			}
		}

	}

?>