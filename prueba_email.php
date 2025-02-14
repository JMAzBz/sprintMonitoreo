<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Crear una instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuraciones del servidor
    $mail->isSMTP();                                // Usar SMTP
    $mail->Host = 'smtp.gmail.com';                 // Servidor SMTP de Google
    $mail->SMTPAuth = true;                         // Habilitar autenticación SMTP
    $mail->Username = 'monitoreosprint@gmail.com';        // Correo electrónico de origen
    $mail->Password = 'xbmj otbc rmwn ngqz';              // Contraseña del correo
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilitar encriptación, `PHPMailer::ENCRYPTION_SMTPS` también funciona
    $mail->Port = 587;                              // Puerto TCP

    // Recipientes
    $mail->setFrom('monitoreosprint@gmail.com', 'Tu Nombre');
    $mail->addAddress('monitoreosprint@gmail.com', 'Nombre Destino'); // Añadir un destinatario

    // Contenido del correo
    $mail->isHTML(true);                            // Ajustar formato del correo a HTML
    $mail->Subject = 'Correo de prueba';
    $mail->Body    = 'Este es el contenido del correo de prueba.';
    $mail->AltBody = 'Este es el contenido del correo de prueba en texto plano.';

    $mail->send();
    echo 'El mensaje ha sido enviado.';
} catch (Exception $e) {
    echo "El mensaje no se pudo enviar. Mailer Error: {$mail->ErrorInfo}";
}
?>
