<?php
	
	header("Access-Control-Allow-Origin: *");//cuañquiera tiene acceso
	header("Content-Type: aplication/json; charset=UTF-8");
	header("Access-Control-Allow-Origin: GET");

	include '../../config/database.php';
	include '../../models/alumno.php';

	$database = new Database();
	$db = $database->getConnection();

	$alumno = new Alumno($db);

	if($alumno->verificarPeriodo() == 2){

		http_response_code(201);

		echo json_encode(array("message" => 2));

	}else{
		
		http_response_code(201);

		echo json_encode(array("message" => "Periodo actualmente activo"));
	}

?>