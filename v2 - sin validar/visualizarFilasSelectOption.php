<?php
    include "configdb.php";
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);

    $sql = "SELECT * FROM preocupacion ORDER BY idPreocupacion ASC"; //guardamos la consulta

    $resultado = $conexion->query($sql); // al ser $sql un select, query devuelve un objeto a $resultado

    if($resultado->num_rows>0){ //comprueba si $resultado tiene filas
        while ($fila = $resultado->fetch_array()){ // Toma una fila del objeto $resultado, la convierte en array y la guarda en $fila. Se repite hasta que no queden más filas
            echo "id: ".$fila['idPreocupacion']." Nombre: ".$fila['nombre']."<br>";
        }
    }else{
        echo "no hay datos en la tabla";
    }
?>