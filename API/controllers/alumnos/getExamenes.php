<?php 

	header("Access-Control-Allow-Origin: *");//cuañquiera tiene acceso
	header("Content-Type: aplication/json; charset=UTF-8");
	header("Access-Control-Allow-Origin: GET");

	include '../../config/database.php';
	include '../../models/alumno.php';

	$database = new Database();
	$db = $database->getConnection();

	$alumno = new Alumno($db);

	//obtener los examenes 
	$statement = $alumno->getAllExamenesById();
	$num = $statement->rowCount();



		
	if($num > 0){

		//arreglo de examenes
		$examenes['examenes'] = array();

		while($row = $statement->fetch(PDO::FETCH_ASSOC)){
			extract($row);

			$examen= array(

				"idUsuario" => $idUsuario,
				"numControl" => $numControl,
				"plan" => $nombrePlan,
				"materia" => $nombreMateria,
				"estado" => $estado

			);

			array_push($examenes['examenes'], $examen);
		}

		http_response_code(201);

		echo json_encode($examenes);
		
	}else{

		http_response_code(404);

		echo json_encode(array("message" => "No se encontraron examenes"));
	}

?>