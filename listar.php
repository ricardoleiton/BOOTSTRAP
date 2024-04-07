<?php

$conexion = mysqli_connect("localhost", "usuario", "Seguridad.123", "ceil");

// Verificar la conexión
if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Llamar a la función para listar registros
listar($conexion);

// Cerrar la conexión
mysqli_close($conexion);

// Función para listar registros
function listar($conexion) {
    // Consulta SQL para obtener todos los registros
    $consulta = "SELECT * FROM ceil";
    $resultados = mysqli_query($conexion, $consulta);

    // Verificar si la consulta fue exitosa
    if ($resultados) {
        // Verificar si hay registros
        if (mysqli_num_rows($resultados) > 0) {
            // Crear una tabla HTML para mostrar los resultados
            echo "<table border='1'>
                <tr>
                    <th>id</th>
                    <th>Actividad</th>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                </tr>";

            // Mostrar los resultados en la tabla
            while ($fila = mysqli_fetch_assoc($resultados)) {
                echo "<tr>
                    <td>{$fila['id']}</td>
                    <td>{$fila['actividad']}</td>
                    <td>{$fila['dni']}</td>
                    <td>{$fila['nombre']}</td>
                    <td>{$fila['email']}</td>
                    <td>{$fila['telefono']}</td>
                </tr>";
            }

            echo "</table>";
        } else {
            echo "No hay registros en la base de datos.";
        }

        // Liberar el conjunto de resultados
        mysqli_free_result($resultados);
    } else {
        // Manejar el caso en que la consulta no fue exitosa
        echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
    }
}

?>