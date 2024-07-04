<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir la biblioteca PHPMailer
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conectar a la base de datos (reemplaza los valores con los de tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sistema";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $folio = $_POST['folio'];
    $asignado = $_POST['asignado'];
    $diagnostico_t = $_POST['diagnostico_t'];
    $tipo_servicio = $_POST['tipo_servicio'];
    $hora_concluido = $_POST['hora_concluido'];
    $estado = $_POST['estado'];
    $materiales = $_POST['materiales'];
    $correo_corporativo = $_POST['correo_corporativo']; // Agregado para obtener el correo corporativo
    $estado_g = $_POST['estado_g'];
    $fecha_proceso = $_POST['fecha_proceso'];

    // Código para manejar la carga de archivos
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../uploads/' . $fileNameNew;

                    move_uploaded_file($fileTmpName, $fileDestination);

                    // Guardar la ruta del archivo en la base de datos
                    $sqlFile = "UPDATE alta_quejas SET imagen='$fileDestination' WHERE folio=$folio";
                    $conn->query($sqlFile);
                } else {
                    echo "Your file is too big!";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "You cannot upload files of this type!";
        }
    }

    // Actualizar los campos en la base de datos
    $sql = "UPDATE alta_quejas SET asignado='$asignado', diagnostico_t='$diagnostico_t', tipo_servicio='$tipo_servicio', hora_concluido='$hora_concluido', estado='$estado', materiales='$materiales', estado_g='$estado_g', fecha_proceso='$fecha_proceso' WHERE folio=$folio";

    if ($conn->query($sql) === TRUE) {
        // Configurar PHPMailer


        try {

            echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = '../reportes.php';</script>";
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se ha enviado el formulario, redirigir a la página principal
    header("Location: reportes.php");
    exit();
}
?>
