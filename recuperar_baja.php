<?php
// Conecta a la base de datos (asegúrate de proporcionar tus propios valores)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

// Crea una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtén el código del registro a mover desde la solicitud GET
$codigo = $_GET['codigo'];

// Prepara y ejecuta la consulta SQL para mover el registro a la tabla "reclutamiento_baja"
$sql = "INSERT INTO reclutamiento SELECT codigo, fecha_alta, ap_pat, ap_mat, nombre, ubicacion, salario_diario, sbc, departamento, turno, nss, rfc, curp, sexo, fecha_nac, puesto, entidad, cp, estado_civil, e_banco, n_ecuenta, suc_epago, imss_pat FROM reclutamiento_baja WHERE codigo = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $codigo); // "i" indica un entero (cambia si el campo no es un entero)
    
    if ($stmt->execute()) {
        // Registro movido con éxito
        echo "Registro movido a la tabla reclutamiento_baja con éxito.";
    } else {
        echo "Error al mover el registro: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conn->error;
}

// Luego, elimina el registro de la tabla "reclutamiento" si es necesario
$sql = "DELETE FROM reclutamiento_baja WHERE codigo = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $codigo); // "i" indica un entero (cambia si el campo no es un entero)
    
    if ($stmt->execute()) {
        // Registro eliminado con éxito
        echo "Registro eliminado de la tabla reclutamiento con éxito. window.location.href = 'registro_nominas.php';";
    } else {
        echo "Error al eliminar el registro de la tabla reclutamiento: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();
?>