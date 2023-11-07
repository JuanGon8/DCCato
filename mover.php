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
if (isset($_GET['codigo'])) {
    $codigo_a_transferir = $_GET['codigo'];

    // Consulta para seleccionar el registro específico
    $consulta = "SELECT * FROM reclutamiento WHERE codigo = '$codigo_a_transferir'";

    $resultado = $conn->query($consulta);

    // Insertar datos en la tabla 'reclutamiento_repse'
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();

        $codigo = $fila['codigo'];
        $fecha_alta = $fila['fecha_alta'];
        $ap_pat = $fila['ap_pat'];
        $ap_mat = $fila['ap_mat'];
        $nombre = $fila['nombre'];
        $ubicacion = $fila['ubicacion'];
        $departamento = $fila['departamento'];
        $nss = $fila['nss'];
        $curp = $fila['curp'];
        $sexo = $fila['sexo'];
        $fecha_nac = $fila['fecha_nac'];
        $puesto = $fila['puesto'];
        $entidad = $fila['entidad'];

        // Consulta de inserción en la tabla 'reclutamiento_repse'
        $insertar = "INSERT INTO reclutamiento_repse (codigo, fecha_alta, ap_pat, ap_mat, nombre, ubicacion, departamento, nss, curp, sexo, fecha_nac, puesto)
        VALUES ('$codigo', '$fecha_alta', '$ap_pat', '$ap_mat', '$nombre', '$ubicacion', '$departamento', '$nss', '$curp', '$sexo', '$fecha_nac', '$puesto')";

        if ($conn->query($insertar) === TRUE) {
            echo "Registro insertado en reclutamiento_repse correctamente.";
        } else {
            echo "Error al insertar el registro en reclutamiento_repse: " . $conn->error;
        }
    } else {
        echo "No se encontró el registro en la tabla 'reclutamiento' con el código especificado.";
    }
} else {
    echo "Código de registro no proporcionado en la URL.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
