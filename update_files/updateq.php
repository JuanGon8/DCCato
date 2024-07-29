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
    $dbname = "sistema3";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $folio = $_POST['folio'];
    $asignado = $_POST['asignado'];
    $diagnostico_t = $_POST['diagnostico_t'];
    $new_observation = $_POST['new_observation'] ?? '';
    $hora_concluido = $_POST['hora_concluido'];
    $estado = $_POST['estado'];
    $materiales = $_POST['materiales'];
    $correo_corporativo = $_POST['correo_corporativo']; // Agregado para obtener el correo corporativo
    $estado_g = $_POST['estado_g'];
    $fecha_proceso = $_POST['fecha_proceso'];

     // Concatenar la nueva observación si existe
     if (!empty($new_observation)) {
        $numero_observaciones = substr_count($diagnostico_t, 'Observación') + 1;
        $diagnostico_t .= "\nObservación #{$numero_observaciones}: {$new_observation}";
    }

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

    // Actualizar los otros campos en la base de datos
    $sql = "UPDATE alta_quejas SET asignado='$asignado', diagnostico_t='$diagnostico_t', hora_concluido='$hora_concluido', estado='$estado', materiales='$materiales', estado_g='$estado_g', fecha_proceso='$fecha_proceso' WHERE folio=$folio";

    if ($conn->query($sql) === TRUE) {
        // Configurar PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'mail.gruposvm.com'; // Cambiar por el servidor SMTP de tu empresa
            $mail->SMTPAuth   = true;
            $mail->Username   = 'reportes.sistemas@gruposvm.com'; // Cambiar por tu correo electrónico
            $mail->Password   = 'svm@2019'; // Cambiar por tu contraseña
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // Destinatario y remitente
            $mail->setFrom('reportes.sistemas@gruposvm.com', 'Reportes de sistemas');
            $mail->addAddress($correo_corporativo); // Utiliza el correo corporativo almacenado en la columna "correo_corporativo"

            // Contenido del correo
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Actualización de reporte';
            ob_start();
            include '../mail/email.php';
            $mail->Body = ob_get_clean();

            // Enviar correo
            $mail->send();
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
