<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema3";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para obtener datos y contar ocurrencias
function obtenerConteo($columna) {
    global $conn;
    $sql = "SELECT $columna FROM alta_reportes";
    $result = $conn->query($sql);

    $conteo = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $valor = $row[$columna];
            if (isset($conteo[$valor])) {
                $conteo[$valor]++;
            } else {
                $conteo[$valor] = 1;
            }
        }
    }

    return $conteo;
}

// Obtener conteo para asignado
$conteo_asignado = obtenerConteo("asignado");

// Obtener conteo para estado
$conteo_estado = obtenerConteo("estado");

// Cerrar conexión
$conn->close();

// Enviar datos como JSON
header('Content-Type: application/json');
echo json_encode(array(
    'asignado' => $conteo_asignado,
    'estado' => $conteo_estado,
));
?>
