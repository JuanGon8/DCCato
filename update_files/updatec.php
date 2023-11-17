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

    // Obtener los datos del formulario
    $id = $_POST['id'];
    $nombres = $_POST['nombres'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $telefono = $_POST['telefono'];
    $edad = $_POST['edad'];
    $moto = $_POST['moto'];
    $ultimo_empleo = $_POST['ultimo_empleo'];
    $antiguedad = $_POST['antiguedad'];
    $motivo_salida = $_POST['motivo_salida'];
    $puesto_aplicado = $_POST['puesto_aplicado'];
    $comentarios = $_POST['comentarios'];
    $direccion = $_POST['direccion'];

    // Realiza la actualización en la base de datos (reemplaza con tu propia consulta SQL)
    $sql = "UPDATE candidatos SET
            nombres = '$nombres',
            primer_apellido = '$primer_apellido',
            segundo_apellido = '$segundo_apellido',
            telefono = '$telefono',
            edad = '$edad',
            moto = '$moto',
            antiguedad = '$antiguedad',
            puesto_aplicado = '$puesto_aplicado',
            motivo_salida = '$motivo_salida',
            comentarios = '$comentarios',
            direccion = '$direccion'
            WHERE id = '$id'"; // Reemplaza "id" por el identificador del registro a actualizar

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = 'registro_candidatos.php';</script>";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }

    $conn->close();
    ?>
