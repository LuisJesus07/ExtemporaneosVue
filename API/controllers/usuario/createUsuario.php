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

	$errors = '';
	$soloLetras = '/[a-zA-Z\s]/';

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

		//validar numero de control
		if(!is_numeric($data->numControl) || strlen($data->numControl) > 10){
			# ingrese num control valido
			$errors .='Ingresa numero de control valido';
			http_response_code(406);
		}

		//validar nombre
		if(is_numeric($data->nombre) || strlen($data->nombre) > 80){
			$errors .='Ingresa un nombre valido';
			http_response_code(406);
		}

		//validar apellidos
		if(is_numeric($data->apellidoPaterno) || strlen($data->apellidoPaterno) > 50){
			$errors .='Ingresa apellido paterno valido';
			http_response_code(406);
		}

		if(is_numeric($data->apellidoMaterno) || strlen($data->apellidoMaterno) > 50){
			$errors .='Ingresa apellido materno valido';
			http_response_code(406);
		}


		//validar correo
		$data->correo = filter_var($data->correo, FILTER_SANITIZE_EMAIL);
		if (!filter_var($data->correo, FILTER_VALIDATE_EMAIL)) {
			# ingrese correo valido
			$errors .= "ingresa un correo valido"; 
			http_response_code(406);
		}

		if(strlen($data->password) > 16){
			$errors .= "Ingresa una contraseña menor a los 16 caracteres";
			http_response_code(406);
		}

		if(!$errors){

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
			echo $errors;
		}

	}else{
		http_response_code(400);

		echo json_encode(array("message"=>"No se ha podido registrar, faltan datos"));
	}






?>