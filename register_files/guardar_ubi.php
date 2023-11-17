<?php
// Crear conexión
$conn = new mysqli("localhost", "root", "", "sistema");
// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}
// Obtener los datos del formulario
$ubicaciont = $_POST['ubicaciont'];
$nombreu = $_POST['nombreu'];
$hora_registro = $_POST['hora_registro'];

// Validar si la consulta ya existe en la base de datos
$consulta_existente = "SELECT * FROM ubicaciones WHERE ubicaciont = '$ubicaciont'";
$resultado = $conn->query($consulta_existente);

if ($resultado->num_rows > 0) {
    // Mostrar alerta de error y redirigir a la página candidatos.php
    echo "<script>alert('La consulta ya existe en la base de datos.'); window.location.href = 'ubicaciones.php';</script>";
} else {
    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO ubicaciones (ubicaciont, nombreu, hora_registro)
            VALUES ('$ubicaciont', '$nombreu', '$hora_registro')";
            
    // Ejecutar la consulta y verificar si se guardaron los datos
    if ($conn->query($sql) === TRUE) {
        // Mostrar alerta de éxito y redirigir a la página candidatos.php
        echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = 'ubicaciones.php';</script>";
    } else {
        echo "Error al guardar los datos: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>