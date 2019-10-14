<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Header: access");
	header("Access-Control-Allow-Methods: GET");
	header("Content-Type: application/json");

	include '../../config/database.php';
	include '../../models/administrador.php';

	$database = new Database();
	$db = $database->getConnection();

	$administrador = new Administrador($db);

	$administrador->idSolicitudExamen = isset($_GET['idSolicitudExamen']) ? $_GET['idSolicitudExamen'] : die();

	if($administrador->updateEstadoExamen()){

		http_response_code(201);

		echo json_encode(array("message" => "Solicitud Aceptada"));
	}else{

		http_response_code(501);

		echo json_encode(array("message" => "No se puso aceptar la solicitud"));
	}



?>