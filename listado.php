<?php

$contacto = mysqli_connect("localhost", "usuario", "Seguridad.123", "contacto");

// Verificar la conexión
if (!$contacto) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Llamar a la función para listar registros
listar($contacto);

// Cerrar la conexión
mysqli_close($contacto);

// Función para listar registros
function listar($contacto) {
    // Consulta SQL para obtener todos los registros
    $consulta = "SELECT * FROM contacto";
    $resultados = mysqli_query($contacto, $consulta);

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
                    <td>{$fila['nombre']}</td>
                    <td>{$fila['email']}</td>
                    <td>{$fila['telefono']}</td>
                    <td>{$fila['asunto']}</td>
                    <td>{$fila['mensaje']}</td>
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
        echo "Error al ejecutar la consulta: " . mysqli_error($contacto);
    }
}

?>