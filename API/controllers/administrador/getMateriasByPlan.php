<?php
	
	header("Access-Control-Allow-Origin: *");//cuañquiera tiene acceso
	header("Content-Type: aplication/json; charset=UTF-8");
	header("Access-Control-Allow-Origin: GET");

	include '../../config/database.php';
	include '../../models/administrador.php';

	$database = new Database();
	$db = $database->getConnection();

	$administrador = new Administrador($db);

	$administrador->idPlan = isset($_GET['idPlan']) ? $_GET['idPlan'] : die();

	/*
	$data = json_decode(file_get_contents("php://input"));

	$administrador->idPlan = $data->idPlan;

	echo $data->idPlan;
	*/

	$statement = $administrador->getMateriasByPlan();
	$num = $statement->rowCount();

	if($num > 0){

		$materias['materias'] = array(); 

		while($row = $statement->fetch(PDO::FETCH_ASSOC)){
			extract($row);

			$materia = array(
				"nombreMateria" => $nombreMateria
			);

			array_push($materias['materias'], $materia);
		}

		http_response_code(201);
		echo json_encode($materias);
	}else{

		http_response_code(404);

		echo json_encode(array("message" => "No hay materias"));
	}

?>