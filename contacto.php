<?php

$contacto = mysqli_connect("localhost", "usuario", "Seguridad.123", "contacto");

dist_func_boton($contacto);

function dist_func_boton($contacto){ //Funciones del boton
    if(isset($_POST['enviar'])){ //Funcion enviar a BD
        insertar($contacto);
    }
}

function insertar($contacto){ //Funcion para agregar registro a la BD
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $consulta = "INSERT INTO contacto(nombre, email, telefono, asunto, mensaje)
    VALUES ('$nombre', '$email', '$telefono', '$asunto', '$mensaje')";
    mysqli_query($contacto, $consulta);
    mysqli_close($contacto);

    // Redirigir al usuario a la página principal (index.html)
    //header("Location: index.html");
    //exit(); // Asegura que el script se detenga después de la redirección

}

// Redirigir al usuario a la página principal (index.html)
header("Location: index.html");
exit(); // Asegura que el script se detenga después de la redirección

?>