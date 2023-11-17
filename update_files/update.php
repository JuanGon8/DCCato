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

    // Realiza la actualización en la base de datos (reemplaza con tu propia consulta SQL)
    $sql = "UPDATE reclutamiento SET
            fecha_alta = '$fecha_alta',
            ap_pat = '$ap_pat',
            ap_mat = '$ap_mat',
            nombre = '$nombre',
            ubicacion = '$ubicacion',
            salario_diario = '$salario_diario',
            sbc = '$sbc',
            departamento = '$departamento',
            turno = '$turno',
            nss = '$nss',
            rfc = '$rfc',
            curp = '$curp',
            sexo = '$sexo',
            fecha_nac = '$fecha_nac',
            puesto = '$puesto',
            entidad = '$entidad',
            cp = '$cp',
            estado_civil = '$estado_civil',
            e_banco = '$e_banco',
            n_ecuenta = '$n_ecuenta',
            suc_epago = '$suc_epago',
            imss_pat = '$imss_pat'
            WHERE codigo = '$codigo'"; // Reemplaza "id" por el identificador del registro a actualizar

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = 'registro_nominas.php';</script>";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }

    $conn->close();
    ?>