<?php
// Crear conexión
$conn = new mysqli("localhost", "root", "", "sistema");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los datos del formulario
// $codigo = $_POST['codigo'];
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

//SE DESVALIDA NSS RFC

$consulta_existente = "SELECT codigo, curp FROM reclutamiento WHERE curp = '$curp' OR codigo = '$codigo'";
$resultado = $conn->query($consulta_existente);

if ($resultado->num_rows > 0) {
    $filas = $resultado->fetch_assoc();
    $mensajes = [];

    if ($filas['codigo'] == $codigo) {
        $mensajes[] = "El código ya existe en la base de datos.";
    }

    // if ($filas['rfc'] == $rfc) {
    //     $mensajes[] = "El RFC ingresado ya existe en la base de datos.";
    // }

    if ($filas['curp'] == $curp) {
        $mensajes[] = "El CURP ingresado ya existe en la base de datos.";
    }

    // if ($filas['nss'] == $nss) {
    //     $mensajes[] = "El NSS ingresado ya existe en la base de datos.";
    // }

    // Mostrar alerta de error con mensajes específicos
    $mensaje = implode(" ", $mensajes);
    echo "<script>alert('$mensaje'); window.location.href = 'registro_nominas.php';</script>";
} else {
    // Preparar la consulta SQL para insertar los datos en la tabla "reclutamiento"
    $sql_reclutamiento = "INSERT INTO reclutamiento (codigo, fecha_alta, ap_pat, ap_mat, nombre, ubicacion, salario_diario, sbc, departamento, turno, nss, rfc, curp, sexo, fecha_nac, puesto, entidad, cp, estado_civil, e_banco, n_ecuenta, suc_epago, imss_pat, nombreu, hora_registro)
            VALUES ('$codigo', '$fecha_alta', '$ap_pat', '$ap_mat', '$nombre', '$ubicacion', '$salario_diario', '$sbc', '$departamento', '$turno', '$nss', '$rfc', '$curp', '$sexo', '$fecha_nac', '$puesto', '$entidad', '$cp', '$estado_civil', '$e_banco', '$n_ecuenta', '$suc_epago', '$imss_pat', '$nombreu', '$hora_registro')";

    // Preparar la consulta SQL para insertar los datos en la tabla "reclutamiento_16340"
    $sql_reclutamiento_16340 = "INSERT INTO reclutamiento_16340 (codigo, ap_pat, ap_mat, nombre)
            VALUES ('$codigo', '$ap_pat', '$ap_mat', '$nombre')";

    // Ejecutar la consulta para la tabla "reclutamiento"
    if ($conn->query($sql_reclutamiento) === TRUE) {
        // Mostrar alerta de éxito y redirigir a la página de registro
        echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = 'registro_nominas.php';</script>";
    } else {
        echo "Error al guardar los datos en la tabla reclutamiento: " . $conn->error;
    }

    // Ejecutar la consulta para la tabla "reclutamiento_16340"
    if ($conn->query($sql_reclutamiento_16340) === TRUE) {
        // Mostrar alerta de éxito y redirigir a la página de registro
        echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = 'registro_nominas.php';</script>";
    } else {
        echo "Error al guardar los datos en la tabla reclutamiento_16340: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
