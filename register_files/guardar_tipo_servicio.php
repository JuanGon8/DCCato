<?php
// Crear conexión
$conn = new mysqli("localhost", "root", "", "sistema");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$nombre_servicio = $_POST['nombre_servicio'];
$depto = $_POST['depto'];

// Cifrar la contraseña en SHA-1 (si es necesario, aunque no se usa en este fragmento)
$password_hashed = sha1($password);

// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO tipo_servicio (nombre_servicio, depto)
        VALUES ('$nombre_servicio', '$depto')";
        
// Ejecutar la consulta y verificar si se guardaron los datos
if ($conn->query($sql) === TRUE) {
    // Mostrar alerta de éxito y redirigir a la página tipo_servicios.php
    echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = 'tipo_servicios.php';</script>";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
