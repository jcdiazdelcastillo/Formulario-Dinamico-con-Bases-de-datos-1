<?php
	include "conexion.php";
	$conexion = (new Conexion())->obtenerConexion();
	echo"<h2> VISUALIZACIÓN DE DATOS DE USUARIOS</h2>";
	
	///////////
	try{

		echo "<h3>USUARIOS CON SU MARCA Y PATROCINIO</h3>";
		$sql="SELECT usuarios.nombre AS nombreUsuario, marcas.nombre AS nombreMarca, patrocinios.tipoPatrocinio AS tipoPatrocinio
		FROM usuarios
		INNER JOIN marcas on usuarios.idMarca = marcas.idMarca
		INNER JOIN patrocinios on usuarios.idPatrocinio = patrocinios.idPatrocinio";
		
		$resultado=$conexion->query($sql);
	
		if($resultado->num_rows>0){
			echo "<b>Nombre del Usuario -- Marca -- Tipo de patrocinio</b><br>";
			foreach($resultado as $fila){
				echo $fila['nombreUsuario']." -- ".$fila['nombreMarca']." -- ".$fila['tipoPatrocinio']."<br>";
			}
		}
		
	}catch(mysqli_sql_exception $e){
		echo "ERROR: ".$e->getCode()." -- ".$e->getMessage();
	}
	
	////////////////
	try{
		
		echo "<h3>USUARIOS QUE NO TIENEN LA MARCA NIKE</h3>";
		
		$sql="SELECT usuarios.nombre AS nombreUsuario, marcas.nombre AS nombreMarca
		FROM usuarios
		INNER JOIN marcas on usuarios.idMarca = marcas.idMarca
		WHERE marcas.nombre!='Nike'";
		
		$resultado=$conexion->query($sql);

	if($resultado->num_rows>0){
		echo "<b>Nombre del Usuario -- Marca</b><br>";
		foreach($resultado as $fila){
			echo $fila['nombreUsuario']." -- ".$fila['nombreMarca']."<br>";
		}
	}
	
	}catch(mysqli_sql_exception $e){
		echo "ERROR: ".$e->getCode()." -- ".$e->getMessage();
	}
	
	///////////
	try{
		echo "<h3>USUARIOS QUE PRACTICAN DEPORTES ENTRE EL id 1 y el id 3</h3>";
		
		$sql="SELECT usuarios.nombre as nombreUsuario, deportes.idDeporte as deporte
		FROM usuarios
		INNER JOIN deportes_usuarios on usuarios.idUsuario = deportes_usuarios.idUsuario
		INNER join deportes on deportes_usuarios.idDeporte = deportes.idDeporte
		WHERE deportes.idDeporte BETWEEN 1 and 3";
		$resultado=$conexion->query($sql);
		foreach($resultado as $fila){
			echo $fila['nombreUsuario']." -- ".$fila['deporte']."<br>";
		}
	}catch(mysqli_sql_exception $e){
		echo "ERROR: ".$e->getCode()." -- ".$e->getMessage();
	}
	
?>