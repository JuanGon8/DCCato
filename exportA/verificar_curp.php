<?php
// Crear conexión
$conn = new mysqli("localhost", "root", "", "sistema3");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener el valor de CURP del formulario
$curp = $_POST['curp'];

// Validar si la CURP ya existe en la base de datos
$consulta_existente = "SELECT curp FROM reclutamiento_a WHERE curp = '$curp'";
$resultado = $conn->query($consulta_existente);

if ($resultado->num_rows > 0) {
    // CURP ya existe en la base de datos
    echo 'CURP_EXISTE';
} else {
    // CURP no existe en la base de datos
    echo 'CURP_NO_EXISTE';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
