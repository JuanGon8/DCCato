<?php
// Iniciar la sesión
session_start();

// Conexión a la base de datos
$servername = "localhost"; // Cambia esto según tu configuración
$username = "root"; // Cambia esto según tu configuración
$password = ""; // Cambia esto según tu configuración
$dbname = "sistema3"; // Cambia esto según tu configuración

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el valor de $_SESSION['depto']
if (!isset($_SESSION['depto'])) {
    die("El departamento no está configurado.");
}

$depto = $_SESSION['depto'];

// Preparar la consulta
$sql = "SELECT nombre_servicio FROM tipo_servicio WHERE depto = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $depto);
$stmt->execute();
$result = $stmt->get_result();

// Crear un array para almacenar los servicios
$servicios = array();
while ($row = $result->fetch_assoc()) {
    $servicios[] = $row['nombre_servicio'];
}

// Cerrar la conexión
$stmt->close();
$conn->close();

// Devolver los servicios en formato JSON
header('Content-Type: application/json');
echo json_encode($servicios);
?>