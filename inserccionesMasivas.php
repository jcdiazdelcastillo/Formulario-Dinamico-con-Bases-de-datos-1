<?php
	include "configdb.php";
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
	/*
	$sql = "INSERT INTO deportes (nombre) VALUES
	('Tenis'),
	('Futbol'),
	('Baloncesto'),
	('Boleibol');";
	
	$conexion->query($sql);
	*/
	$sql = "INSERT INTO patrocinios (tipoPatrocinio) VALUES
	('completo'),
	('reducido'),
	('parcial'),
	('basico');";
	
	$conexion->query($sql);
	
	$sql = "INSERT INTO marcas (nombre) VALUES
	('Nike'),
	('Joma'),
	('Head'),
	('Adidas'),
	('Babolat'),
	('Wilson');";
	$conexion->query($sql);
?>