<?php

class Administrador{

	private $conn;

	//propiedades de la clase
	public $idSolicitudExamen;
	public $idPlan;
	public $carrera;
	public $plan;
	public $materia;


	function __construct($db){
		$this->conn = $db;
	}

	function getExamenesByCarrera(){

	}

	function getExamenesByPlan(){

	}

	function getExamenesByMateria(){

	}

	function getExamenesEnEspera(){

		$query = "SELECT SOLI.idSolicitudExamen,USU.numControl,USU.nombre,USU.apellidoPaterno,USU.apellidoMaterno,PLAN.nombrePlan,CARR.nombreCarrera,
		MAT.nombreMateria,SOLI.estado
		FROM usuarios AS USU 
		INNER JOIN planesDeEstudio AS PLAN ON PLAN.idPlanDeEstudio=USU.idPlanDeEstudio
		INNER JOIN carreras AS CARR ON CARR.idCarrera=PLAN.idCarrera
		INNER JOIN solicitudesExamenes AS SOLI ON USU.idUsuario=SOLI.idUsuario
		INNER JOIN materias AS MAT ON MAT.idMateria=SOLI.idMateria
		WHERE SOLI.estado = 2";

		$statement = $this->conn->prepare($query);

		$statement->execute();

		return $statement;
	}

	function updateEstadoExamen(){

		$query = "UPDATE solicitudesExamenes SET estado= 1  WHERE idSolicitudExamen =:idSolicitudExamen";

		$statement = $this->conn->prepare($query);

		$statement->bindParam(":idSolicitudExamen", $this->idSolicitudExamen);

		if($statement->execute()){
			return true;
		}

		return false;
	}

	function getMateriasByPlan(){

		$query = "SELECT nombreMateria FROM materias AS MAT
				INNER JOIN planesDeEstudio AS PLAN ON MAT.idPlanDeEstudio=PLAN.idPlanDeEstudio
				WHERE PLAN.idPlanDeEstudio=:idPlan
				ORDER BY MAT.nombreMateria ASC";

		$statement = $this->conn->prepare($query);

		$statement->bindParam(":idPlan", $this->idPlan);


		$statement->execute();



		return $statement;
	}
}

?>