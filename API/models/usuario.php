<?php

class Usuario{
	//conexion a la base de datos y nombre de la tabla
	private $conn;
	private $table_name = "usuarios";

	//propiedades de la clase
	public $idUsuario;
	public $numControl;
	public $nombre;
	public $apellidoPaterno;
	public $apellidoMaterno;
	public $correo;
	public $password;
	public $privilegios;
	public $idPlanDeEstudio;

	//constructor de la conexion 
	public function __construct($db){
		$this->conn = $db;
	}

	function create(){
		$query = "INSERT INTO ".$this->table_name."(numControl,nombre,apellidoPaterno,apellidoMaterno,correo,password,privilegios,idPlanDeEstudio) VALUES(:numControl,:nombre,:apellidoPaterno,:apellidoMaterno,:correo,:password,:privilegios,:idPlanDeEstudio)";

		$statement = $this->conn->prepare($query);

		//limpiarlos los datos enviados
		$this->numControl = htmlspecialchars(strip_tags($this->numControl));
		$this->nombre = htmlspecialchars(strip_tags($this->nombre));
		$this->apellidoPaterno = htmlspecialchars(strip_tags($this->apellidoPaterno));
		$this->apellidoMaterno = htmlspecialchars(strip_tags($this->apellidoMaterno));
		$this->correo = htmlspecialchars(strip_tags($this->correo));
		$this->password = htmlspecialchars(strip_tags($this->password));
		$this->privilegios = htmlspecialchars(strip_tags($this->privilegios));
		$this->idPlanDeEstudio = htmlspecialchars(strip_tags($this->idPlanDeEstudio));

		$statement->bindParam(":numControl",$this->numControl);
		$statement->bindParam(":nombre",$this->nombre);
		$statement->bindParam(":apellidoPaterno",$this->apellidoPaterno);
		$statement->bindParam(":apellidoMaterno",$this->apellidoMaterno);
		$statement->bindParam(":correo",$this->correo);
		$statement->bindParam(":password",$this->password);
		$statement->bindParam(":privilegios",$this->privilegios);
		$statement->bindParam(":idPlanDeEstudio",$this->idPlanDeEstudio);

		if($statement->execute()){
			return true;
		}

		return false;
	}

	function getAll(){
		$query = "SELECT * FROM ".$this->table_name;

		$statement = $this->conn->prepare($query);

		$statement->execute();

		return $statement;
	}

	function getById(){
		$query = "SELECT USU.idUsuario,USU.numControl,USU.nombre,USU.apellidoPaterno,USU.apellidoMaterno,PLAN.nombrePlan,CARR.nombreCarrera
			FROM ".$this->table_name." AS USU 
			INNER JOIN planesDeEstudio AS PLAN ON PLAN.idPlanDeEstudio=USU.idPlanDeEstudio
			INNER JOIN carreras AS CARR ON CARR.idCarrera=PLAN.idCarrera
			WHERE USU.idUsuario=".$this->idUsuario;

		$statement = $this->conn->prepare($query);

		$statement->execute();

		$row = $statement->fetch(PDO::FETCH_ASSOC);

		$this->numControl = $row['numControl'];
		$this->nombre = $row['nombre'];
		$this->apellidoPaterno = $row['apellidoPaterno'];
		$this->apellidoMaterno = $row['apellidoMaterno'];
		$this->nombrePlan = $row['nombrePlan'];
		$this->nombreCarrera = $row['nombreCarrera'];
	}

	function verificarSiExisteCorreo(){
		$query="SELECT COUNT(correo) FROM usuarios WHERE correo=:correo";

		$statement = $this->conn->prepare($query);

		//limpiar lo datos que manda el ususario	
		$this->correo = htmlspecialchars(strip_tags($this->correo));
		$statement->bindParam(":correo", $this->correo);

		//ejecutar
		$statement->execute();

		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$siExiste = $row["COUNT(correo)"];


		return $siExiste;

	}



}

?>