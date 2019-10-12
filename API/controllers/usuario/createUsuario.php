<?php

	header("Access-Control-Allow-Origin: *");//cuañquiera tiene acceso
	header("Content-Type: aplication/json; charset=UTF-8");
	header("Access-Control-Allow-Origin: POST");

	include_once '../../config/database.php';
	include_once '../../models/usuario.php';

	//instanciar la conexion
	$database = new Database();
	$db = $database->getConnection();

	$usuario = new Usuario($db);

	//obtener lod datos enviados
	$data = json_decode(file_get_contents("php://input"));

	//asegurarse de que los datos no esten vacios
	if(
		!empty($data->numControl) &&
		!empty($data->nombre) &&
		!empty($data->apellidoPaterno) &&
		!empty($data->apellidoMaterno) &&
		!empty($data->correo) &&
		!empty($data->password) &&
		!empty($data->idPlanDeEstudio)
	){
		//asignamos datso al usuario
		$usuario->numControl = $data->numControl;
		$usuario->nombre = $data->nombre;
		$usuario->apellidoPaterno = $data->apellidoPaterno;
		$usuario->apellidoMaterno = $data->apellidoMaterno;
		$usuario->correo = $data->correo;
		$usuario->password = $data->password;
		$usuario->privilegios = 2;
		$usuario->idPlanDeEstudio = $data->idPlanDeEstudio;

		if($usuario->verificarSiExisteCorreo() == 1){
			//confilc response
			http_response_code(409);

			echo json_encode(array("message"=>"El correo que ingreso ya existe.Intenete con otro"));
		}else{
			//insertar el usuario
			if($usuario->create()){
				http_response_code(201);

				echo json_encode(array("message" => "Registrado correctamente"));

			}else{
				http_response_code(501);

				echo json_encode(array("message"=>"No se pudo registrar"));
			}	

		}

		

	}else{
		http_response_code(400);

		echo json_encode(array("message"=>"No se ha podido registrar, faltan datos"));
	}






?>