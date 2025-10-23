<?php
    include "configdb.php";
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);

    $sql = "SELECT * FROM preocupacion ORDER BY idPreocupacion ASC";
    $preocupaciones = $conexion->query($sql);

    $sql = "SELECT * FROM  transportes ORDER BY idTransporte ASC";
    $transporte = $conexion->query($sql);

    $sql = "SELECT * FROM medidas ORDER BY idMedida ASC";
    $medidas = $conexion->query($sql);

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
        <title>Formulario sobre la movilidad sostenible</title>
    </head>
    <body>
        <header>
            <h1>Formulario de opinión</h1>
            <nav id="navegacion">
                <div id="barranavegacion">
                    <a href = "insercion_masiva.php">Inserción masiva select option en bd</a>
                    <a href="visualizarFilasSelectOption.php"> Visualizar filas del select option</a>
                </div>
            </nav>
        </header>
        <main> 
            <h2>Cuéntanos tu opinión sobre el impacto del transporte en el medio ambiente</h2>
            <form action="recoger.php" method="post">
                <div>
                    <label for="nombre">Nombre</label>
                    <input type = "text" name="nombre" id="nombre">
                </div>

                <div>
                    <label for="email">Correo electronico</label>
                    <input type = "email" name="email" id="email">
                </div>

                <div>
                    <label for="edad">Edad </label>
                    <input type = "number" name="edad" id="edad">
                </div>

                <div>
                    <p>¿Que medio de transporte utilizas normalmente?</p>
                    <?php
                        while ($fila = $transporte->fetch_assoc()){
                            echo "<div class = 'radio-individual'>";
                                echo "<input type='radio' id='".$fila['nombre']."' name='transporte' value = '". $fila['idTransporte']."'>";
                                echo "<label for='".$fila['nombre']."'>".$fila['nombre']."</label>";
                            echo "</div>";
                        }
                    ?>
                </div>

                <div class="radio-general">
                    <p>¿Qué medidas apoyarías para combatir el cambio climático?</p>
                    <?php
                        while($fila = $medidas->fetch_assoc()){
                            echo "<div class='radio-individual'>";
                                echo "<label for='".$fila['nombre']."'>".$fila['nombre']."</label>";
                                echo "<input type='checkbox' name='medidas[]' value='".$fila['idMedida']."'id='".$fila['nombre']."'>";
                            echo "</div>";
                        }
                    ?>
                    <label for="opiniones" id="opinion">Nivel de preocupación sobre el impacto medioambiental</label>
                    <select name="opiniones" id="opiniones">
                        <?php
                            while ($fila = $preocupaciones->fetch_assoc()){
                                echo "<option value =".$fila['idPreocupacion'].">".$fila['nombre']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="radio-general">
                    <p>Aceptas terminos y licencias</p>
                    <div class="radio-individual">
                        <label for = "terminos">Si</label>
                        <input type = "checkbox" name="terminos" id="terminos" value="1">
                    </div>
                <div>
                    <input type="submit" name="Enviar">
                    <input type="reset" name="Reiniciar">
                </div>
            </form>
        </main>
    </body>
    <footer>
        <p>Juan Carlos Díaz del Castillo</p>
        <p>TAREA CAMBIO CLIMÁTICO - 2DAW</p>
    </footer>
</html>