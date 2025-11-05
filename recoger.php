<?php
	//validar
	include "Usuarios.php";
	
	$nombre=$_POST['nombre'];
	$telefono=$_POST['telefono'];
	$email=$_POST['email'];
	if(empty($nombre) || empty($telefono) || empty ($email) || !isset($_POST['deportes']) || !isset($_POST['marca'])|| !isset($_POST['patrocinio'])){
		echo "Error, faltan datos obligatorios<br>";
		echo "<a href='formulario.php'>Volver al formulario</a>";
	}else{
		$objUsuarios = new Usuarios();
		if($objUsuarios->introducirUsuarios()){
			if($objUsuarios->introducirDeportes_usuarios()){
				echo "<br>FORMULARIO INTRODUCIDO CORRECTAMENTE<br>";
				echo "<a href='formulario.php'>Volver atrás</a>'";
			}
		}else{
			echo "<br>error al introducir usuario<br>";
			echo "<a href='formulario.php'>Volver al formulario</a>";
		}
	}
?>