<?php
// Conexión a la base de datos (ajusta según tus configuraciones)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener fechas desde la solicitud GET
$fecha1r = $_GET['fecha1r'];
$fecha2r = $_GET['fecha2r'];

// Consulta a la base de datos
$sql = "SELECT codigo, fecha_alta, ap_pat, ap_mat, nombre, ubicacion, salario_diario, sbc, departamento, turno, nss, rfc, curp, sexo, fecha_nac, puesto, entidad, cp, estado_civil, e_banco, n_ecuenta, suc_epago, imss_pat, tipo_contrato, base_cot, estatus_emp, sindicalizado, tipo_reg, tipo_prest, estatus_emp, fecha_reingreso, fecha_baja FROM reclutamiento WHERE fecha_reingreso BETWEEN '$fecha1r' AND '$fecha2r'";
$result = $conn->query($sql);

// Preparar datos para respuesta AJAX
$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Cerrar conexión
$conn->close();

// Enviar respuesta como JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
