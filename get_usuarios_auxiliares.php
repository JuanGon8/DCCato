<?php
session_start();
$depto = $_SESSION['depto'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
    SELECT id, nombre FROM usuarios WHERE depto = ?
    UNION
    SELECT id, nombre FROM usuarios_auxiliares WHERE depto = ?
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $depto, $depto);
$stmt->execute();
$result = $stmt->get_result();

$usuarios = array();
while ($row = $result->fetch_assoc()) {
    $usuarios[] = $row;
}

echo json_encode($usuarios);

$stmt->close();
$conn->close();
?>
