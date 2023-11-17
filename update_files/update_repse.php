<?php
// Conexión a la base de datos (reemplaza con tus propios valores)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Recibe los valores del modal
$codigo = $_POST['codigo'];
$repse_activo = isset($_POST['repse_activo']) ? 1 : 0;
$alta_imss = isset($_POST['alta_imss']) ? 1 : 0;
// Realiza la actualización en la base de datos
$sql = "UPDATE reclutamiento_repse SET
        repse_activo = '$repse_activo',
        alta_imss = '$alta_imss'
        WHERE codigo = '$codigo'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = 'repse.php';</script>";
} else {
    echo "Error al actualizar la información: " . $conn->error;
}

$conn->close();
?>
