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
$camisa = isset($_POST['camisa']) ? 1 : 0;
$pantalon = isset($_POST['pantalon']) ? 1 : 0;
$gorra = isset($_POST['gorra']) ? 1 : 0;
$cor_mando = isset($_POST['cor_mando']) ? 1 : 0;
$fornitura = isset($_POST['fornitura']) ? 1 : 0;
$impermeable = isset($_POST['impermeable']) ? 1 : 0;
$lampara = isset($_POST['lampara']) ? 1 : 0;
$bata = isset($_POST['bata']) ? 1 : 0;

// Realiza la actualización en la base de datos
$sql = "UPDATE reclutamiento SET
        camisa = '$camisa',
        pantalon = '$pantalon',
        gorra = '$gorra',
        cor_mando = '$cor_mando',
        fornitura = '$fornitura',
        impermeable = '$impermeable',
        lampara = '$lampara',
        bata = '$bata'
        WHERE codigo = '$codigo'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = 'uniformes.php';</script>";
} else {
    echo "Error al actualizar la información: " . $conn->error;
}

$conn->close();
?>
