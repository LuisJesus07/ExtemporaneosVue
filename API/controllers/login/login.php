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

		switch ($login->iniciarSesion()) {
			case 1:
				echo "admin";
				break;
			case 2:
				echo "alumno";
				break;
			default:
				echo "error";
				break;
		}


	}else{
		http_response_code(404);

		echo json_encode(array("message" => "Ingrese el correo y la contraseña"));
	}

?>