<?php
    include "configdb.php";
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
    
    // COMPROBAR QUE LOS CAMPOS SE HAYAN RELLENADO
    if(!isset($_POST['terminos'])){
        echo 'formulario no enviado, términos no aceptados';
        echo "<a href='formulario.php'>VOLVER ATRÁS </a>";
    }else if(empty($_POST['nombre'])|| empty($_POST['email']) || empty($_POST['edad']) || isset($_POST[''])
        || !isset($_POST['transporte']) || !isset ($_POST['medidas']) || !isset($_POST['terminos'])){ //comprobar que los campos email, nombre y edad NO estén en blanco. QUE SEAN REQUERIDOS
        echo "faltan campos obligatorios<br>";
        echo "<a href='formulario.php'>VOLVER ATRÁS </a>";
    }else{
        //comprobamos si el usuario existe en la tabla usuarios
        $sql = "SELECT idUsuario FROM usuarios WHERE email ='".$_POST['email']."'";
        $usuarioExiste = $conexion->query($sql);

        if($usuarioExiste->num_rows>0){
            echo "YA SE HA INTRODUCIDO UN USUARIO CON ESTE EMAIL";
            echo "<a href='formulario.php'>VOLVER ATRÁS </a>";
        }else{
            //si no existe lo creamos en la tabla usuarios
            $sql = "INSERT INTO usuarios (nombre,email,edad, idTransporte, idPreocupacion)VALUES(
                '".$_POST['nombre']."',
                '".$_POST['email']."',
                '".$_POST['edad']."',
                '".$_POST['transporte']."',
                '".$_POST['opiniones']."'
            );";
            $resultado=$conexion->query($sql);
            if($resultado){
                echo "Usuario insertado correctamente<br>";
                echo "<a href='formulario.php'>VOLVER ATRÁS</a><br>";

                $idUsuario = $conexion->insert_id; //PROPIEDAD (variable) que pertenece a la clase mysqli. SACAMOS EL Último idUsuario que se ha introducido en la bd
                $errores= false; //iremos si al introducir alguna medida da error ponemos true
                //NO HACE FALTA VALIDAR SI SE HAN ENVIADO LAS MEDIDAS, YA VALIDADAS ARRIBA
                foreach($_POST['medidas'] as $medida){
                        $sql = "INSERT INTO usuarios_medidas (idUsuario, idMedida) VALUES ($idUsuario, $medida)";
                        $resultado = $conexion->query($sql);
                        if(!$resultado){
                            echo "problema al insertar la medida con id '".$medida."'<br>";
                            $errores = true;
                        }
                }
            }else{
                echo "problema al insertar el usuario";
            }
            if(!$errores){
                echo "todas las medidas insertadas correctamente";
            }
        }
    }
?>