<?php

	header("Access-Control-Allow-Origin: *");//cuañquiera tiene acceso
	header("Content-Type: aplication/json; charset=UTF-8");
	header("Access-Control-Allow-Origin: POST");

	include '../../config/database.php';
	include '../../models/alumno.php';

	//inicializar la hora de acuerdo a la zona
	ini_set('date.timezone', 'America/Mazatlan');

	$database = new Database();
	$db = $database->getConnection();

	$alumno = new Alumno($db);

	//obtener los datos enviados
	$data = json_decode(file_get_contents("php://input"));

	if(
		!empty($data->idMateria) 
	){

		$alumno->idMateria = $data->idMateria;
		$alumno->fechaRegistro = date('Y:m:d', time());

		//si hay mas de dos solicitudes el examen pasa a espera
		if($alumno->totalExamenes() >= 2){
			$alumno->estado = 2;
		}else{
			$alumno->estado = 1;
		}

		if($alumno->insertExamen()){

			http_response_code(201);

			echo json_encode(array("message" => "Solicitud exitosa"));
		}

	}else{

		http_response_code(404);

		echo json_encode(array("message" => "Error, faltan datos"));
	}

?>