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
$contrato = isset($_POST['contrato']) ? "1" : "0";
$acta_nac = isset($_POST['acta_nac']) ? "1" : "0";
$nsss = isset($_POST['nsss']) ? "1" : "0";
$car_mil = isset($_POST['car_mil']) ? "1" : "0";
$com_doc = isset($_POST['com_doc']) ? "1" : "0";
$com_estu = isset($_POST['com_estu']) ? "1" : "0";
$ine = isset($_POST['ine']) ? "1" : "0";
$car_rec = isset($_POST['car_rec']) ? "1" : "0";
$ant_pen = isset($_POST['ant_pen']) ? "1" : "0";
$alta_imss = isset($_POST['alta_imss']) ? "1" : "0";
$tbanco = isset($_POST['tbanco']) ? "1" : "0";



// Realiza la actualización en la base de datos
$sql = "UPDATE reclutamiento SET
        contrato = '$contrato',
        acta_nac = '$acta_nac',
        nsss = '$nsss',
        car_mil = '$car_mil',
        com_doc = '$com_doc',
        com_estu = '$com_estu',
        ine = '$ine',
        car_rec = '$car_rec',
        ant_pen = '$ant_pen',
        alta_imss = '$alta_imss',
        tbanco = '$tbanco'
        WHERE codigo = '$codigo'";


if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = 'control_expedientes.php';</script>";
} else {
    echo "Error al actualizar la información: " . $conn->error;
}

$conn->close();
?>
