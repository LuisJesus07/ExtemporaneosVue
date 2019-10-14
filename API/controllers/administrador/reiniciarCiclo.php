<?php
	header("Access-Control-Allow-Origin: *");//cuañquiera tiene acceso
	header("Content-Type: aplication/json; charset=UTF-8");
	header("Access-Control-Allow-Origin: GET");

	include '../../config/database.php';
	include '../../models/administrador.php';

	$database = new Database();
	$db = $database->getConnection();

	$administrador = new Administrador($db);

	if($administrador->reiniciarCiclo()){

		http_response_code(201);

		echo json_encode(array("message" => "Ciclo reiniciado con exito"));
	}else{

		http_response_code(501);

		echo json_encode(array("message" => "No se pudo reiniciar el ciclo"));
	}

?>