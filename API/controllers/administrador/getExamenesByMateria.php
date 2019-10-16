<?php

	//include '../../config/database.php';
	//include '../../models/administrador.php';

	$database = new Database();
	$db = $database->getConnection();

	$administrador = new Administrador($db);

	$administrador->idPlanDeEstudio = isset($_POST['plan']) ? $_POST['plan'] : die();
	$administrador->nombreMateria = isset($_POST['materia']) ? $_POST['materia'] : die();


	$statement = $administrador->getExamenesByMateria();
	$num = $statement->rowCount();

	$examenes = array();
	$examenes['examenes'] = array();

	if($num > 0){

		while($row = $statement->fetch(PDO::FETCH_ASSOC)){
			extract($row);

			$examen = array(
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

		//var_dump($examenes);

	}else{
		echo "no hay";
	}

?>