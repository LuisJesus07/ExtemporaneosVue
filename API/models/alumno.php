<?php

class Alumno{

	private $conn;
	private $table_name = "usuarios";

	//examen
	public $idSolicitudExamen;
	public $estado;
	public $fechaRegistro;
	public $idMateria;
	public $correo;


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

	function insertExamen(){

		$query = "INSERT INTO solicitudesExamenes(estado,fechaRegistro,idUsuario,idMateria) VALUES(:estado,:fechaRegistro,:idUsuario,:idMateria);";

		$statement = $this->conn->prepare($query);

		$statement->bindParam(":estado", $this->estado);
		$statement->bindParam(":fechaRegistro", $this->fechaRegistro);
		$statement->bindParam(":idUsuario", $_SESSION['datosUsuario']['idUsuario']);
		$statement->bindParam(":idMateria", $this->idMateria);

		if($statement->execute()){
			return true;
		}

		return false;

	}

	//verificar si el periodo de solicitudes esta activo
	function verificarPeriodo(){

		$query = "SELECT estado FROM periodo";

		$statement = $this->conn->prepare($query);

		$statement->execute();

		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$estado = $row["estado"];


		return $estado;

	}

	function totalExamenes(){

		$query = "SELECT COUNT(USU.idUsuario)
				FROM usuarios AS USU 
				INNER JOIN planesDeEstudio AS PLAN ON PLAN.idPlanDeEstudio=USU.idPlanDeEstudio
				INNER JOIN carreras AS CARR ON CARR.idCarrera=PLAN.idCarrera
				INNER JOIN solicitudesExamenes AS SOLI ON USU.idUsuario=SOLI.idUsuario
				INNER JOIN materias AS MAT ON MAT.idMateria=SOLI.idMateria
				WHERE USU.idUsuario = :idUsuario";

		$statement = $this->conn->prepare($query);

		$statement->bindParam(":idUsuario", $_SESSION['datosUsuario']['idUsuario']);

		$statement->execute();

		$examenesSolicitados = $statement->fetch(PDO::FETCH_ASSOC);

		return $examenesSolicitados["COUNT(USU.idUsuario)"];
	}

	function deleteExamen(){

		$query="DELETE FROM solicitudesExamenes WHERE idSolicitudExamen=".$this->idSolicitudExamen;

		$statement = $this->conn->prepare($query);


		if($statement->execute()){
			return true;
		}

		return false;
	}

	/* cambia el estado de un examen en caso de que queden solo dos solicitudes */
	function cambiarEstadoExamen(){

		$query ="CALL cambiarEstadoExamen(:idUsuario)";

		$statement = $this->conn->prepare($query);

		$statement->bindParam(":idUsuario", $_SESSION['datosUsuario']['idUsuario']);

		if($statement->execute()){
			return true;
		}

		return false;
	}

	function getMateriasByPlan(){

		$query = "SELECT MAT.idMateria,MAT.nombreMateria,PLAN.idPlanDeEstudio
			FROM materias AS MAT
			INNER JOIN planesDeEstudio AS PLAN ON MAT.idPlanDeEstudio=PLAN.idPlanDeEstudio
			WHERE PLAN.idPlanDeEstudio = :idPlanDeEstudio
			ORDER BY MAT.nombreMateria ASC";

		$statement = $this->conn->prepare($query);

		$statement->bindParam(":idPlanDeEstudio", $_SESSION['datosUsuario']['idPlanDeEstudio']);

		$statement->execute();

		return $statement;

	}

	function recuperarPassword(){

		$query = "SELECT password FROM usuarios WHERE correo=:correo";

		$statement = $this->conn->prepare($query);

		$statement->bindParam(":correo", $this->correo);

		if($statement->execute()){
			
			$pass = $statement->fetch(PDO::FETCH_ASSOC);

			return  $pass['password'];


			//return true;

		}

		return false;
	}
}

?>