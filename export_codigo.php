<?php
// Conexión a la base de datos (ajusta según tus configuraciones)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener fechas desde la solicitud GET
$cod1 = $_GET['cod1'];
$cod2 = $_GET['cod2'];

// Consulta a la base de datos
$result = $conn->query($sql);

// Preparar datos para respuesta AJAX
$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Cerrar conexión
$conn->close();

// Enviar respuesta como JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
