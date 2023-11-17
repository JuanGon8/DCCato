<?php
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conectar a la base de datos (reemplaza los valores con los de tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sistema";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $folio = $_POST['folio'];
    $asignado = $_POST['asignado'];
    $diagnostico_t = $_POST['diagnostico_t'];
    $tipo_servicio = $_POST['tipo_servicio'];
    $hora_concluido = $_POST['hora_concluido'];
    $estado = $_POST['estado'];
    $materiales = $_POST['materiales'];

    // Actualizar los campos en la base de datos
    $sql = "UPDATE alta_reportes SET asignado='$asignado', diagnostico_t='$diagnostico_t', tipo_servicio='$tipo_servicio', hora_concluido='$hora_concluido', estado='$estado', materiales='$materiales' WHERE folio=$folio";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = 'registro_candidatos.php';</script>";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se ha enviado el formulario, redirigir a la página principal
    header("Location: reportes.php");
    exit();
}
?>
