<?php
	include "configdb.php";
	
	class Conexion{
		protected $conexion;
		function __construct(){
			try{
			$this->conexion= new Mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
			}catch(mysqli_sql_exception $e){
				die ("Error de base de datos");
			}
		}
		
		function obtenerConexion(){
			return $this->conexion;
		}
		
		function __destruct(){
			$this->conexion-close();
		}
	}
?>