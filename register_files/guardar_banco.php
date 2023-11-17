<?php
// Crear conexión
$conn = new mysqli("localhost", "root", "", "sistema");
// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}
// Obtener los datos del formulario
$c_banco = $_POST['c_banco'];
$n_banco = $_POST['n_banco'];
$nombreu = $_POST['nombreu'];
$hora_registro = $_POST['hora_registro'];

// Validar si la consulta ya existe en la base de datos
$consulta_existente = "SELECT * FROM bancos WHERE c_banco = '$c_banco' OR n_banco = '$n_banco'";
$resultado = $conn->query($consulta_existente);

if ($resultado->num_rows > 0) {
    // Mostrar alerta de error y redirigir a la página candidatos.php
    echo "<script>alert('La consulta ya existe en la base de datos.'); window.location.href = 'bancos.php';</script>";
} else {
    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO bancos (c_banco, n_banco, nombreu, hora_registro)
            VALUES ('$c_banco', '$n_banco', '$nombreu', '$hora_registro')";
            
    // Ejecutar la consulta y verificar si se guardaron los datos
    if ($conn->query($sql) === TRUE) {
        // Mostrar alerta de éxito y redirigir a la página candidatos.php
        echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = 'bancos.php';</script>";
    } else {
        echo "Error al guardar los datos: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>