<?php

// Crear conexión
$conn = new mysqli("localhost", "root", "", "sistema"); 

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombres = $_POST['nombres'];
$primer_apellido = $_POST['primer_apellido'];
$segundo_apellido = $_POST['segundo_apellido'];
$telefono = $_POST['telefono'];
$edad = $_POST['edad'];
$moto = $_POST['moto'];
$ultimo_empleo = $_POST['ultimo_empleo'];
$antiguedad = $_POST['antiguedad'];
$motivo_salida = $_POST['motivo_salida'];
$puesto_aplicado = $_POST['puesto_aplicado'];
$estats = $_POST['estats'];
$comentarios = $_POST['comentarios'];
$direccion = $_POST['direccion'];
$nombreu = $_POST['nombreu'];
$hora_registro = $_POST['hora_registro'];

// Preparar la consulta SQL
$sql = "INSERT INTO candidatos (nombres, primer_apellido, segundo_apellido, telefono, edad, moto, ultimo_empleo, antiguedad, motivo_salida, puesto_aplicado, estats, comentarios, direccion, nombreu, hora_registro)
        VALUES ('$nombres', '$primer_apellido', '$segundo_apellido', '$telefono', '$edad', '$moto', '$ultimo_empleo', '$antiguedad', '$motivo_salida', '$puesto_aplicado', '$estats', '$comentarios', '$direccion', '$nombreu', '$hora_registro')";

// Ejecutar la consulta y verificar si se guardaron los datos
if ($conn->query($sql) === TRUE) {
    // Mostrar alerta y redirigir a la página candidatos.php
    echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = 'registro_candidatos.php';</script>";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>