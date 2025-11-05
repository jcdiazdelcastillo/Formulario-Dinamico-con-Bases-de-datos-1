<?php
	include "rellenarDatos.php";
	$datos=new RellenarDatos();
	
	$deportes = $datos->sacarDeportes();
	$patrocinios = $datos->sacarPatrocinios();
	$marcas=$datos->sacarMarcas();
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>DEPORTES</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles.css">
	</head>
	<body>
		<form action="recoger.php" method="POST">
			<label for="nombre">Nombre</label>
			<input type="text" id="nombre" name="nombre">
			<label for="telefono">Telefono</label>
			<input type="text" id="telefono" name="telefono">
			<label for="email">Email</label>
			<input type="email" id="email" name="email">
			
			<h3>¿Qué deportes practicas?</h3> <!--checkbox-group-->
			<div class="checkbox-group">
				<?php
					while($fila=$deportes->fetch_assoc()){
						echo "<div>";
						echo "<input type='checkbox' id='".$fila['nombre']."' name='deportes[]' value='".$fila['idDeporte']."'>";
						echo "<label for='".$fila['nombre']."'>".$fila['nombre']."</label>";
						echo "</div>";
					}
				?>
			</div>
			
			<label for="patrocinios">Escoge tu patrocinio</label><!--SELECT OPTION-->
			<select name="patrocinio">
				<?php
					while($fila=$patrocinios->fetch_assoc()){
						echo "<option value='".$fila['idPatrocinio']."'>".$fila['tipoPatrocinio']."</option>";
					}

				?>
			</select>
			<h3>ESCOGE TU MARCA</h3> <!--RADIO BUTTON radio-group--> 
			<div class='radio-group'>
			<?php
				while($fila=$marcas->fetch_assoc()){
					echo "<div>";
					echo "<input type='radio' id='".$fila['nombre']."' value='".$fila['idMarca']."' name='marca'>";
					echo "<label for='".$fila['nombre']."'>".$fila['nombre']."</label>";
					echo "</div>";
				}
			?>
			</div>
			<input type="submit" value="Enviar">
		</form>
	</body>
</html>