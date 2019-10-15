<?php

	$database = new Database();
	$db = $database->getConnection();

	$administrador = new Administrador($db);

	$statement = $administrador->getExamenesEnEspera();
	$num = $statement->rowCount();

	$examenes = array();
	$examenes['examenes'] = array();

	if($num > 0){

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


	}

	

?>