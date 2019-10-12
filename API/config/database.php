<?php


class Database{

	private $host = "localhost";
	private $db_name = "extemporaneos";
	private $username = "root";
	private $password = "";
	public $conn;


	public function getConnection(){

		$this->conn = null;

		try{

			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);

			$this->conn->exec("set names utf8");

		}catch(PDOException $e){
			echo "Error en la conexion ". $e->getMessage();
		}

		return $this->conn;

	}
}

?>