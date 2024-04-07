<?php

$conexion = mysqli_connect("localhost", "usuario", "Seguridad.123", "ceil");

dist_func_boton($conexion);

function dist_func_boton($conexion){ //Funciones del boton
    if(isset($_POST['enviar'])){ //Funcion enviar a BD
        insertar($conexion);
    }
    if(isset($_POST['eliminar'])){ //Funcion eliminar de BD
        eliminar($conexion);
    }
}

function insertar($conexion){ //Funcion para agregar registro a la BD
    $actividad = $_POST['actividad'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $consulta = "INSERT INTO ceil(actividad, dni, nombre, email, telefono)
    VALUES ('$actividad', '$dni', '$nombre', '$email', '$telefono')";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    // Redirigir al usuario a la página principal (index.html)
    //header("Location: index.html");
    //exit(); // Asegura que el script se detenga después de la redirección

}

function eliminar($conexion){ //Funcion para eliminar registro de BD
    $dni = $_POST['dni'];
    
    $consulta = "DELETE FROM ceil WHERE dni='$dni'";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    // Redirigir al usuario a la página principal (index.html)
    //header("Location: index.html");
    //exit(); // Asegura que el script se detenga después de la redirección

}

// Redirigir al usuario a la página principal (index.html)
header("Location: index.html");
exit(); // Asegura que el script se detenga después de la redirección

?>