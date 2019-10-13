<?php

class Login{

	private $conn;
	private $table_name = "usuarios";

	//propiedades de la clase
	public $correo;
	public $password;
	//datos de la sesion
	/*public $privilegios;
	public $idUsuario;
	public $numControl;
	public $nombre;
	public $idPlanDeEstudios;*/

	function __construct($db){
		$this->conn = $db;
	}


	function iniciarSesion(){

		$query = "SELECT * FROM usuarios WHERE correo= :correo AND password= :password";

		$statement = $this->conn->prepare($query);

		$this->correo = htmlspecialchars(strip_tags($this->correo));
		$this->password = htmlspecialchars(strip_tags($this->password));

		$statement->bindParam(":correo", $this->correo);
		$statement->bindParam(":password", $this->password);

		$statement->execute();


		if($statement->rowCount() !=0){

			//guardar los datos de la sesion
			session_start();
			//$_SESSION['datosUsuario'];


			while($row = $statement->fetch(PDO::FETCH_ASSOC)){

				$_SESSION['datosUsuario']['privilegios'] = $row['privilegios'];
				$_SESSION['datosUsuario']['idUsuario'] = $row['idUsuario'];
				$_SESSION['datosUsuario']['numControl'] = $row['numControl'];
				$_SESSION['datosUsuario']['correo'] = $row['correo'];
				$_SESSION['datosUsuario']['nombre'] = $row['nombre'];
				$_SESSION['datosUsuario']['idPlanDeEstudio'] = $row['idPlanDeEstudio'];
			}


			return $_SESSION['datosUsuario']['privilegios'];

		}
		

		return 0;
		//return $statement->execute();

	}
}

?>