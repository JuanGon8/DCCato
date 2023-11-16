<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir la biblioteca PHPMailer
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Recoger los datos del formulario
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$departamento = $_POST['departamento'];
$fecha = $_POST['fecha'];
$correo_corporativo = $_POST['correo_corporativo'];

// Obtener el folio desde JavaScript o generarlo si no se recibe
$folio = isset($_POST['folio_js']) ? $_POST['folio_js'] : mt_rand(10000, 99999);

// Configurar el objeto PHPMailer para enviar al departamento de sistemas
$mail_sistemas = new PHPMailer(true);

try {
    // Configuración del servidor SMTP para el departamento de sistemas
    $mail_sistemas->isSMTP();
    $mail_sistemas->Host       = 'mail.gruposvm.com'; // Cambia esto por el servidor SMTP de tu proveedor de correo
    $mail_sistemas->SMTPAuth   = true;
    $mail_sistemas->Username   = 'reportes.sistemas@gruposvm.com'; // Cambia esto por tu dirección de correo electrónico
    $mail_sistemas->Password   = 'svm@2019'; // Cambia esto por tu contraseña de correo electrónico
    $mail_sistemas->SMTPSecure = 'tls';
    $mail_sistemas->Port       = 587;
    $mail_sistemas->CharSet = 'UTF-8';

    // Configuración del correo para el departamento de sistemas
    $mail_sistemas->setFrom('reportes.sistemas@gruposvm.com', 'Reportes de sistemas'); // Cambia esto por tu dirección de correo y nombre
    $mail_sistemas->addAddress('reportes.sistemas@gruposvm.com', 'Departamento de Sistemas'); // Cambia esto por la dirección y nombre del destinatario
    $mail_sistemas->isHTML(true);

    // Asignar el asunto con el número de folio
    $mail_sistemas->Subject = "Nuevo reporte de DCCato #$folio";

    // Añadir el folio al cuerpo del correo para el departamento de sistemas
    $mail_sistemas->Body = "
        <p><strong>Folio:</strong> $folio</p>
        <p><strong>Nombre:</strong> $nombre</p>
        <p><strong>Descripción:</strong> $descripcion</p>
        <p><strong>Departamento:</strong> $departamento</p>
        <p><strong>Hora del reporte:</strong> $fecha</p>
    ";

    // Enviar el correo al departamento de sistemas
    $mail_sistemas->send();

    // Configurar un nuevo objeto PHPMailer para enviar al correo corporativo
    $mail_corporativo = new PHPMailer(true);

    // Configuración del servidor SMTP para el correo corporativo
    $mail_corporativo->isSMTP();
    $mail_corporativo->Host       = 'mail.gruposvm.com'; // Cambia esto por el servidor SMTP de tu proveedor de correo
    $mail_corporativo->SMTPAuth   = true;
    $mail_corporativo->Username   = 'reportes.sistemas@gruposvm.com'; // Cambia esto por tu dirección de correo electrónico
    $mail_corporativo->Password   = 'svm@2019'; // Cambia esto por tu contraseña de correo electrónico
    $mail_corporativo->SMTPSecure = 'tls';
    $mail_corporativo->Port       = 587;
    $mail_corporativo->CharSet = 'UTF-8';

    // Configuración del correo corporativo
    $mail_corporativo->setFrom('reportes.sistemas@gruposvm.com', 'Reportes de sistemas'); // Cambia esto por tu dirección de correo y nombre
    $mail_corporativo->addAddress($correo_corporativo, $nombre); // Usar el correo corporativo proporcionado en el formulario y el nombre del remitente
    $mail_corporativo->isHTML(true);

    // Asignar el asunto con el número de folio
    $mail_corporativo->Subject = "Confirmación de reporte DCCato #$folio";

    // Incluir el contenido de la plantilla en el cuerpo del correo corporativo
    ob_start();
    include 'email.php';
    $mail_corporativo->Body = ob_get_clean();

    // Enviar el correo corporativo
    $mail_corporativo->send();

    // Guardar en la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "sistema";

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Insertar datos en la base de datos
    $sql = "INSERT INTO alta_reportes (nombre, descripcion, departamento, fecha, folio)
            VALUES ('$nombre', '$descripcion', '$departamento', '$fecha', '$folio')";

    if ($conn->query($sql) === TRUE) {
        echo 'El reporte se ha enviado correctamente y se ha guardado en la base de datos. Folio: ' . $folio;
    } else {
        echo "Error al guardar en la base de datos: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();

} catch (Exception $e) {
    echo "Error al enviar el correo: {$e->getMessage()}";
}
?>
