<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'jhoneider937@gmail.com';
        $mail->Password   = 'BELLOTA0506.pucca';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Configuración del remitente y receptor
        $mail->setFrom('tu-email@gmail.com', 'Tu Nombre');
        $mail->addAddress('jhoneider937@gmail.com');

        // Contenido del correo
        $mail->isHTML(false);
        $mail->Subject = 'Nuevo mensaje de contacto';
        $mail->Body    = "Nombre: $name\nCorreo electrónico: $email\nMensaje:\n$message";

        $mail->send();
        echo 'Correo enviado con éxito.';
    } catch (Exception $e) {
        echo 'Error al enviar el correo: ', $mail->ErrorInfo;
    }
}
?>
