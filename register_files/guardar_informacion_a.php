<?php
// Crear conexión
$conn = new mysqli("localhost", "root", "", "sistema");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los datos del formulario
$fecha_alta = $_POST['fecha_alta'];
$ap_pat = $_POST['ap_pat'];
$ap_mat = $_POST['ap_mat'];
$nombre = $_POST['nombre'];
$ubicacion = $_POST['ubicacion'];
$salario_diario = $_POST['salario_diario'];
$sbc = $_POST['sbc'];
$departamento = $_POST['departamento'];
$turno = $_POST['turno'];
$nss = $_POST['nss'];
$rfc = $_POST['rfc'];
$curp = $_POST['curp'];
$sexo = $_POST['sexo'];
$fecha_nac = $_POST['fecha_nac'];
$puesto = $_POST['puesto'];
$entidad = $_POST['entidad'];
$cp = $_POST['cp'];
$estado_civil = $_POST['estado_civil'];
$e_banco = $_POST['e_banco'];
$n_ecuenta = $_POST['n_ecuenta'];
$suc_epago = $_POST['suc_epago'];
$imss_pat = $_POST['imss_pat'];
$nombreu = $_POST['nombreu'];
$hora_registro = $_POST['hora_registro'];
$tipo_contrato = $_POST['tipo_contrato'];
$base_cot = $_POST['base_cot'];
$estatus_emp = $_POST['estatus_emp'];
$sindicalizado = $_POST['sindicalizado'];
$tipo_reg = $_POST['tipo_reg'];
$tipo_prest = $_POST['tipo_prest'];

// Preparar la consulta SQL para insertar los datos en la tabla "reclutamiento_a"
$sql_reclutamiento_a = "INSERT INTO reclutamiento_a (fecha_alta, ap_pat, ap_mat, nombre, ubicacion, salario_diario, sbc, departamento, turno, nss, rfc, curp, sexo, fecha_nac, puesto, entidad, cp, estado_civil, e_banco, n_ecuenta, suc_epago, imss_pat, nombreu, hora_registro, tipo_contrato, base_cot, estatus_emp, sindicalizado, tipo_reg, tipo_prest, fecha_baja, fecha_reingreso)
        VALUES ('$fecha_alta', '$ap_pat', '$ap_mat', '$nombre', '$ubicacion', '$salario_diario', '$sbc', '$departamento', '$turno', '$nss', '$rfc', '$curp', '$sexo', '$fecha_nac', '$puesto', '$entidad', '$cp', '$estado_civil', '$e_banco', '$n_ecuenta', '$suc_epago', '$imss_pat', '$nombreu', '$hora_registro', '$tipo_contrato', '$base_cot', '$estatus_emp', '$sindicalizado', '$tipo_reg', '$tipo_prest', '1999-12-31', '1999-12-31')";

// Preparar la consulta SQL para insertar los datos en la tabla "reclutamiento_a_16340"
$sql_reclutamiento_a_16340 = "INSERT INTO reclutamiento_a_16340 (ap_pat, ap_mat, nombre)
        VALUES ('$ap_pat', '$ap_mat', '$nombre')";

// Ejecutar la consulta para la tabla "reclutamiento_a"
if ($conn->query($sql_reclutamiento_a) === TRUE) {
    // Mostrar alerta de éxito y redirigir a la página de registro
    echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = '../registro_nominas.php';</script>";
} else {
    echo "Error al guardar los datos en la tabla reclutamiento_a: " . $conn->error;
}

// Ejecutar la consulta para la tabla "reclutamiento_a_16340"
if ($conn->query($sql_reclutamiento_a_16340) === TRUE) {
    // Mostrar alerta de éxito y redirigir a la página de registro
    echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = '../registro_nominas.php';</script>";
} else {
    echo "Error al guardar los datos en la tabla reclutamiento_a_16340: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
