<?php
	include "conexion.php";
	class RellenarDatos extends Conexion{
		
		function sacarDeportes(){
			$sql = "select * from deportes ORDER BY idDeporte ASC";
			return $this->conexion->query($sql);
		}
		
		function sacarPatrocinios(){
			$sql ="select * from patrocinios ORDER BY idPatrocinio ASC";
			return $this->conexion->query($sql);
		}
		
		function sacarMarcas(){
			$sql ="select * from marcas ORDER BY idMarca ASC";
			return $this->conexion->query($sql);
		}
		
	}
?>