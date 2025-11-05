<?php
	include "configdb.php";
	
	$conexion= new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
	
		
	//CREAR TABLAS
	$sql="CREATE TABLE Patrocinios(
		idPatrocinio tinyint unsigned NOT NULL AUTO_INCREMENT,
		tipoPatrocinio char(8) NOT NULL UNIQUE,
		PRIMARY KEY (idPatrocinio)
	);";
	$conexion->query($sql);
	
	
	$sql="CREATE TABLE Marcas(
		idMarca tinyint unsigned NOT NULL AUTO_INCREMENT,
		nombre varchar(30) NOT NULL UNIQUE,
		PRIMARY KEY (idMarca)
	);";
	$conexion->query($sql);
	
	
	$sql = "CREATE TABLE deportes(
		idDeporte tinyint unsigned NOT NULL AUTO_INCREMENT,
		nombre varchar(20) NOT NULL UNIQUE,
		PRIMARY KEY (idDeporte)
	);";
	
	$conexion->query($sql);
	
	$sql = "CREATE TABLE Usuarios(
		idUsuario smallint unsigned NOT NULL AUTO_INCREMENT,
		nombre varchar(40) NOT NULL,
		correo varchar (60) NOT NULL UNIQUE,
		telefono char (9) NOT NULL UNIQUE,
		idMarca tinyint UNSIGNED NOT NULL,
		idPatrocinio tinyint unsigned NOT NULL,
		PRIMARY KEY (idUsuario),
		FOREIGN KEY (idMarca) REFERENCES marcas(idMarca),
		FOREIGN KEY (idPatrocinio) REFERENCES patrocinios(idPatrocinio)
		);";
	
	$conexion->query($sql);
	
	$sql = "CREATE TABLE deportes_usuarios(
		idUsuario smallint unsigned NOT NULL,
		idDeporte tinyint unsigned NOT NULL,
		PRIMARY KEY (idUsuario, idDeporte),
		FOREIGN KEY (idUsuario) REFERENCES usuarios (idUsuario),
		FOREIGN KEY (idDeporte) REFERENCES deportes (idDeporte)
	);";
	
	$conexion->query($sql);
	
?>