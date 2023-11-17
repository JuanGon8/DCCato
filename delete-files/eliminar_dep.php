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
$id = $_GET['id'];

// Luego, elimina el registro de la tabla "reclutamiento" si es necesario
$sql = "DELETE FROM departamento WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id); // "i" indica un entero (cambia si el campo no es un entero)
    
    if ($stmt->execute()) {
        // Registro eliminado con éxito
        echo "Registro eliminado de la tabla reclutamiento con éxito. window.location.href = 'departamentos.php';";
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
