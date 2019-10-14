<?php

	header("Access-Control-Allow-Origin: *");//cuañquiera tiene acceso
	header("Content-Type: aplication/json; charset=UTF-8");
	header("Access-Control-Allow-Origin: GET");

	include '../../config/database.php';
	include '../../models/administrador.php';

	$database = new Database();
	$db = $database->getConnection();

	$administrador = new Administrador($db);

	$statement = $administrador->getExamenesEnEspera();
	$num = $statement->rowCount();

	if($num > 0){

		$examenes = array();
		$examenes['examenes'] = array();

		while($row = $statement->fetch(PDO::FETCH_ASSOC)){
			extract($row);

			$examen = array(
				"idSolicitudExamen" => $idSolicitudExamen,
				"numControl" => $numControl,
				"nombre" => $nombre,
				"apellidoPaterno" => $apellidoPaterno,
				"apellidoMaterno" => $apellidoMaterno,
				"nombrePlan" => $nombrePlan,
				"nombreCarrera" => $nombreCarrera,
				"nombreMateria" => $nombreMateria,
				"estado" => $estado
			);

			array_push($examenes['examenes'], $examen);
		}

		http_response_code(201);

		echo json_encode($examenes);
	}else{

		http_response_code(404);

		echo json_encode(array("message" => "No hay examenes"));
	}



?>