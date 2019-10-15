<?php
	
	include '../../config/database.php';
	include '../../models/administrador.php';

	$database = new Database();
	$db = $database->getConnection();

	$administrador = new Administrador($db);

	$administrador->idSolicitudExamen = isset($_POST['idSolicitudExamen']) ? $_POST['idSolicitudExamen'] : die();

	if($administrador->updateEstadoExamen()){

		//http_response_code(201);

		echo "solicitud aceptada";
	}else{

		//http_response_code(501);

		echo "no se pudo aceptar la solicitud";
	}



?>