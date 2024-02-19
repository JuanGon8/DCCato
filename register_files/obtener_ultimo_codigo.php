<?php
// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta para obtener el último valor de la columna "codigo" en la tabla "reclutamiento"
$sql = "SELECT codigo FROM reclutamiento ORDER BY codigo DESC LIMIT 1";
$result = $conn->query($sql);

// Obtener el resultado de la consulta
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ultimoCodigo = $row['codigo'];
    echo $ultimoCodigo;
} else {
    echo "No se encontraron registros en la tabla reclutamiento";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
