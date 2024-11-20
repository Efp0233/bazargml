<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Asegúrate de que la ruta es correcta

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->SMTPDebug = 0; // Desactiva la depuración
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Username = 'f66a4e5cf903f0'; // Reemplaza con tu usuario de Mailtrap
    $mail->Password = 'b19d72b4f538cb'; // Reemplaza con tu contraseña de Mailtrap
    $mail->SMTPSecure = 'tls';
    $mail->Port = 2525;

    // Configuración del remitente y destinatario
    $mail->setFrom('BAZARGML@gmail.com', 'BAZARGML');
    $mail->addAddress('edwin21060233@gmail.com', 'Edwin Flores');

    // Configuración del contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Tu Compra En Bazar GML';
    $mail->Body = '<h1>Gracias Por Tu Compra en BAZARGML</h1><p>En breve te enviaremos informarcion sobre tu pedido.</p>';

    $mail->send();
    echo 'Correo enviado';
} catch (Exception $e) {
    echo 'Error al enviar el correo: ', $mail->ErrorInfo;
}
