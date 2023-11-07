<?php
// Configura la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recupera el ID del registro a mover desde la URL
if (isset($_GET['id'])) {
    $departamentoId = $_GET['id'];

    // Aquí puedes realizar la operación necesaria para mover el registro en función del $departamentoId
    // Por ejemplo, puedes ejecutar una consulta SQL para mover el registro a la tabla "departamento_repse"

    $sql_move = "INSERT INTO repse (departamentot) SELECT departamentot FROM departamento WHERE id = $departamentoId";
    
    if ($conn->query($sql_move) === TRUE) {
        echo "Registro movido a repse correctamente.";
    } else {
        echo "Error al mover el registro: " . $conn->error;
    }
} else {
    echo "ID de registro no proporcionado.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
