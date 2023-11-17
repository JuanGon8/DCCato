<?php
// Crear conexión
$conn = new mysqli("localhost", "root", "", "sistema");
// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}
// Obtener los datos del formulario
$departamentot = $_POST['departamentot'];

// Validar si la consulta ya existe en la base de datos
$consulta_existente = "SELECT * FROM departamento WHERE departamentot = '$departamentot'";
$resultado = $conn->query($consulta_existente);

if ($resultado->num_rows > 0) {
    // Mostrar alerta de error y redirigir a la página candidatos.php
    echo "<script>alert('La consulta ya existe en la base de datos.'); window.location.href = 'departamentos.php';</script>";
} else {
    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO departamento (departamentot)
            VALUES ('$departamentot')";
            
    // Ejecutar la consulta y verificar si se guardaron los datos
    if ($conn->query($sql) === TRUE) {
        // Mostrar alerta de éxito y redirigir a la página candidatos.php
        echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = 'departamentos.php';</script>";
    } else {
        echo "Error al guardar los datos: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>