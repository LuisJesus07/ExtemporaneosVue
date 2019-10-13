<?php

class Alumno{

	private $conn;
	private $table_name = "usuarios";

	public $idSolicitudExamen;


	function __construct($db){
		$this->conn = $db;
		session_start();
	}

	function getAllExamenesById(){

		$query = "SELECT USU.idUsuario,USU.numControl,USU.nombre,USU.apellidoPaterno,USU.apellidoMaterno,PLAN.nombrePlan,CARR.nombreCarrera,
			MAT.nombreMateria,SOLI.estado,SOLI.idSolicitudExamen
			FROM usuarios AS USU 
			INNER JOIN planesDeEstudio AS PLAN ON PLAN.idPlanDeEstudio=USU.idPlanDeEstudio
			INNER JOIN carreras AS CARR ON CARR.idCarrera=PLAN.idCarrera
			INNER JOIN solicitudesExamenes AS SOLI ON USU.idUsuario=SOLI.idUsuario
			INNER JOIN materias AS MAT ON MAT.idMateria=SOLI.idMateria
			WHERE USU.idUsuario = :idUsuario
			ORDER BY SOLI.estado ASC";

		$statement = $this->conn->prepare($query);

		$statement->bindParam(":idUsuario", $_SESSION['datosUsuario']['idUsuario']);		

		$statement->execute();

		return $statement;
	}

	function deleteExamen(){

		$query="DELETE FROM solicitudesExamenes WHERE idSolicitudExamen=".$this->idSolicitudExamen;

		$statement = $this->conn->prepare($query);


		if($statement->execute()){
			return true;
		}

		return false;
	}
}

?>