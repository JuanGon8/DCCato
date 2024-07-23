<?php
$servername = "localhost"; // O tu servidor de base de datos
$username = "root"; // O tu usuario de base de datos
$password = ""; // O tu contraseña de base de datos
$dbname = "sistema"; // O el nombre de tu base de datos

// Crea una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}
?>