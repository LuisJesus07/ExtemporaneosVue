<?php

	header("Access-Control-Allow-Origin: *");//cuañquiera tiene acceso
	header("Content-Type: aplication/json; charset=UTF-8");
	header("Access-Control-Allow-Origin: GET");

	include '../../config/database.php';
	include '../../models/alumno.php';

	$database = new Database();
	$db = $database->getConnection();

	$alumno = new Alumno($db);

	$statement = $alumno->getMateriasByPlan();
	$num = $statement->rowCount();

	if($num > 0){

		$materias['materias'] = array();

		while($row = $statement->fetch(PDO::FETCH_ASSOC)){
			extract($row);

			$materia = array(
				"idMateria" => $idMateria,
				"nombreMateria" => $nombreMateria
			);

			array_push($materias['materias'], $materia);
		}

		http_response_code(201);

		echo json_encode($materias);
	}else{
		http_response_code(404);

		echo json_encode(array("message" => "No hay ninguna materia"));
	}

?>