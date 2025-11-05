<?php
	include "conexion.php";
	class Usuarios extends Conexion{ 
		function introducirUsuarios(){
			try{
				$nombre=$_POST['nombre']; 
				$telefono=$_POST['telefono']; 
				$email=$_POST['email']; 
				$deportes=$_POST['deportes']; 
				$patrocinio=$_POST['patrocinio']; 
				$marca = $_POST['marca']; 
				
				$sql = "insert into usuarios (nombre, telefono, correo, idPatrocinio, idMarca) 
				VALUES(
				'".$nombre."',
				'".$telefono."',
				'".$email."',
				".$patrocinio.",
				".$marca."
				)";
			
				$this->conexion->query($sql);
				return true;
			}catch(mysqli_sql_exception $e){
				if($e->getCode()==1062){
					echo "ERROR - CLAVE REPETIDA";
				}else{
					echo "ERROR: ".$e->getCode()." -- ".$e->getMessage();
				}
				return false;
			}
		}
		
		function introducirDeportes_Usuarios(){ 
			try{
				$idUsuario = $this->conexion->insert_id; 
				$deportes = $_POST['deportes'];
				foreach($deportes as $idDeporte){ 
					$sql="insert into deportes_usuarios(idUsuario, idDeporte) VALUES(".$idUsuario.",".$idDeporte.")";
					$this->conexion->query($sql);
				} 
				return true; 
			}catch(mysqli_sql_exception $e){ 
				echo "ERROR: ".$e.getCode()." -- ".$e->getMessage(); 
				return false; 
			} 
		} 
			
	} 
?>