<?php

//primero daremos los datos de conexión 
include "configdb.php";

$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //creamos el objeto $conexion y le pasamos los parametros de conexion a bd a la clase mysqli

    $sql= "DELETE FROM preocupacion"; //eliminar todas los datos de la tabla
    $resultado = $conexion->query($sql);
    if($resultado)
        echo("<b>Datos antiguos borrados correctamente<br></b>");
    else
        echo ("error al borrar los datos antiguos. NO HAY DATOS");
    
    //INTRODUCIR NUEVOS DATOS
    $sql = "ALTER TABLE preocupacion AUTO_INCREMENT=1"; //Para resetear el auto incremet y empezar por 1.
    $conexion->query($sql);

    $niveles = [ //un array con los datos del select, que introduciremos en el insert into que irá a la bd
        "preocupado",
        "muy preocupado", 
        "nada preocupado",
        "neutral",
        "poco preocupado",
        "me da igual este tema",
        "bla bla bla",
        "nana nana nana"
    ];

    foreach($niveles as $nivel){
        $sql = "INSERT INTO PREOCUPACION (nombre) VALUES ('$nivel')"; //introducimos la consulta en $sql
        $conexion->query($sql); //introducimos $sql en la bd con el metodo query del objeto $conexión
        
        if($conexion->affected_rows){ //metodo de $conexión que dice cuantas filas se han afectado
            echo "Fila ". $nivel." introducida correctamente <br>";
        }else{
            echo "Error al introducir '$nivel'";
        }
    }
