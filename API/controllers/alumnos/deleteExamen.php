<?php

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Header: access");
	header("Access-Control-Allow-Methods: GET");
	header("Content-Type: application/json");

	include_once "../../config/database.php";
	include_once "../../models/alumno.php";

	$database = new Database();
	$db = $database->getConnection();
	$alumno = new Alumno($db);

	$alumno->idSolicitudExamen = isset($_GET['idSolicitudExamen']) ? $_GET['idSolicitudExamen'] : die();

	if($alumno->deleteExamen()){

		http_response_code(201);

		echo json_encode(array("message"=>"El examen ha sido eliminado"));
		
	}else{

		http_response_code(503);

		echo json_encode(array("message"=>"No se ha podido eliminar el examen"));

	}




?>