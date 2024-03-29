<?php
// Conecta a la base de datos (asegúrate de proporcionar tus propios valores)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

// Crea una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtén el código del registro a mover desde la solicitud GET
$codigo = $_GET['codigo'];

// Prepara y ejecuta la consulta SQL para mover el registro a la tabla "reclutamiento_baja"
$sql = "INSERT INTO reclutamiento SELECT * FROM reclutamiento_baja WHERE codigo = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $codigo); // "i" indica un entero (cambia si el campo no es un entero)
    
    if ($stmt->execute()) {
        // Registro movido con éxito

        // Ahora, actualiza el valor de la columna "estatus_emp" a "B" y "fecha_baja" a la fecha actual en la tabla "reclutamiento_baja"
        $updateSql = "UPDATE reclutamiento SET estatus_emp = 'R', fecha_reingreso = NOW() WHERE codigo = ?";
        if ($updateStmt = $conn->prepare($updateSql)) {
            $updateStmt->bind_param("i", $codigo);
            
            if ($updateStmt->execute()) {
                echo "Registro movido a la tabla reclutamiento_baja, estatus_emp actualizado a 'B' y fecha_baja actualizada con éxito.";
            } else {
                echo "Error al actualizar el estatus_emp y fecha_baja: " . $updateStmt->error;
            }

            $updateStmt->close();
        } else {
            echo "Error en la preparación de la consulta de actualización: " . $conn->error;
        }

    } else {
        echo "Error al mover el registro: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conn->error;
}

// Luego, elimina el registro de la tabla "reclutamiento" si es necesario
$sql = "DELETE FROM reclutamiento_baja WHERE codigo = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $codigo); // "i" indica un entero (cambia si el campo no es un entero)
    
    if ($stmt->execute()) {
        // Registro eliminado con éxito
        echo "Registro eliminado de la tabla reclutamiento con éxito. window.location.href = 'registro_nominas.php';";
    } else {
        echo "Error al eliminar el registro de la tabla reclutamiento: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();
?>
