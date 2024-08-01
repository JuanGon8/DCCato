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
$departamento_receptor = $_POST['departamento_receptor'];
$prioridad = $_POST['prioridad'];

// Obtener el folio desde JavaScript o generarlo si no se recibe
$folio = isset($_POST['folio_js']) ? $_POST['folio_js'] : mt_rand(10000, 99999);

try {
    // Configurar el objeto PHPMailer para enviar al departamento de sistemas
    $mail_sistemas = new PHPMailer(true);
    $mail_sistemas->isSMTP();
    $mail_sistemas->Host       = 'mail.gruposvm.com'; // Cambia esto por el servidor SMTP de tu proveedor de correo
    $mail_sistemas->SMTPAuth   = true;
    $mail_sistemas->Username   = 'reportes.sistemas@gruposvm.com'; // Cambia esto por tu dirección de correo electrónico
    $mail_sistemas->Password   = 'svm@2019'; // Cambia esto por tu contraseña de correo electrónico
    $mail_sistemas->SMTPSecure = 'tls';
    $mail_sistemas->Port       = 587;
    $mail_sistemas->CharSet = 'UTF-8';
    $mail_sistemas->setFrom('reportes.sistemas@gruposvm.com', 'Reportes de sistemas'); // Cambia esto por tu dirección de correo y nombre
    $mail_sistemas->addAddress('reportes.sistemas@gruposvm.com', 'Departamento de Sistemas'); // Cambia esto por la dirección y nombre del destinatario
    $mail_sistemas->isHTML(true);
    $mail_sistemas->Subject = "Nuevo reporte de DCCato";
    $mail_sistemas->Body = "
        <p><strong>Nombre:</strong> $nombre</p>
        <p><strong>Descripción:</strong> $descripcion</p>
        <p><strong>Departamento:</strong> $departamento</p>
        <p><strong>Hora del reporte:</strong> $fecha</p>
    ";
    $mail_sistemas->send();

    // Configurar un nuevo objeto PHPMailer para enviar al departamento receptor seleccionado
    $mail_departamento_receptor = new PHPMailer(true);
    $mail_departamento_receptor->isSMTP();
    $mail_departamento_receptor->Host       = 'mail.gruposvm.com'; // Cambia esto por el servidor SMTP de tu proveedor de correo
    $mail_departamento_receptor->SMTPAuth   = true;
    $mail_departamento_receptor->Username   = 'reportes.sistemas@gruposvm.com'; // Cambia esto por tu dirección de correo electrónico
    $mail_departamento_receptor->Password   = 'svm@2019'; // Cambia esto por tu contraseña de correo electrónico
    $mail_departamento_receptor->SMTPSecure = 'tls';
    $mail_departamento_receptor->Port       = 587;
    $mail_departamento_receptor->CharSet = 'UTF-8';
    $mail_departamento_receptor->setFrom('reportes.sistemas@gruposvm.com', 'Reportes de sistemas'); // Cambia esto por tu dirección de correo y nombre
    $mail_departamento_receptor->addAddress($departamento_receptor); // Usar el correo del departamento receptor seleccionado
    $mail_departamento_receptor->isHTML(true);
    $mail_departamento_receptor->Subject = "Nuevo reporte de DCCato asignado al departamento $departamento_receptor";

     ob_start();
    include 'email_receptor.php';
    $mail_departamento_receptor->Body = ob_get_clean();

    $mail_departamento_receptor->send();

    // Configurar un nuevo objeto PHPMailer para enviar al correo corporativo ingresado
    $mail_corporativo = new PHPMailer(true);
    $mail_corporativo->isSMTP();
    $mail_corporativo->Host       = 'mail.gruposvm.com'; // Cambia esto por el servidor SMTP de tu proveedor de correo
    $mail_corporativo->SMTPAuth   = true;
    $mail_corporativo->Username   = 'reportes.sistemas@gruposvm.com'; // Cambia esto por tu dirección de correo electrónico
    $mail_corporativo->Password   = 'svm@2019'; // Cambia esto por tu contraseña de correo electrónico
    $mail_corporativo->SMTPSecure = 'tls';
    $mail_corporativo->Port       = 587;
    $mail_corporativo->CharSet = 'UTF-8';
    $mail_corporativo->setFrom('reportes.sistemas@gruposvm.com', 'Reportes de sistemas'); // Cambia esto por tu dirección de correo y nombre
    $mail_corporativo->addAddress($correo_corporativo, $nombre); // Usar el correo corporativo proporcionado en el formulario y el nombre del remitente
    $mail_corporativo->isHTML(true);
    $mail_corporativo->Subject = "Confirmación de reporte DCCato";
    // Incluir el contenido de la plantilla en el cuerpo del correo corporativo
    ob_start();
    include 'email.php';
    $mail_corporativo->Body = ob_get_clean();

    $mail_corporativo->send();

    // Guardar en la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "sistema3";

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Insertar datos en la base de datos
    $sql = "INSERT INTO alta_reportes (nombre, descripcion, departamento, fecha, correo_corporativo, prioridad)
            VALUES ('$nombre', '$descripcion', '$departamento', '$fecha', '$correo_corporativo', '$prioridad')";

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
