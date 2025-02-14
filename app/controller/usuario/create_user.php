<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../../vendor/autoload.php';
require '../../config.php';

$user_email  = $_POST['user_email'];
$user_pass   = $_POST['user_pass'];
$pass_repeat = $_POST['pass_repeat'];
$id_persona  = $_POST['id_persona'];
session_start();

if ($user_pass === $pass_repeat) {
    
    $sentencia = $pdo->prepare("INSERT INTO usuarios (user_email, user_pass, persona_fk, insert_at, estado) VALUES (?, crypt(?, gen_salt('bf')),?, now(),true);");
    $sentencia->bindParam(1, $user_email, PDO::PARAM_STR);
    $sentencia->bindParam(2, $user_pass, PDO::PARAM_STR);
    $sentencia->bindParam(3, $id_persona, PDO::PARAM_STR);
    try {
        if ($sentencia->execute()) {
            $_SESSION['mensaje'] = 'Los datos fueron registrados correctamente';
            $_SESSION['icono'] = 'success';
            header('Location:' . APP_URL . 'admin/usuarios');
            
            // Datos del correo
            $email        = 'monitoreosprint@gmail.com';
            $password     = 'xbmj otbc rmwn ngqz'; // Cambia esto a tu contraseña de aplicación si usas Gmail
            $destinatario = $user_email;

            // Configuración del servidor SMTP
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->Port       = 587;
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // O cambiar a PHPMailer::ENCRYPTION_SMTPS
            $mail->Username   = $email;
            $mail->Password   = $password;

            // Configuración del correo
            $mail->setFrom($email, 'Registro al sistema universitario');
            $mail->addAddress($destinatario);
            $mail->addBCC($email);  
            $mail->isHTML(true);
            $mail->Subject = 'Sistema Universitario';

            // Habilita la depuración SMTP
            $mail->SMTPDebug  = SMTP::DEBUG_SERVER;

            // Cargar el cuerpo del correo
            $cuerpo = file_get_contents('../../../admin/layout/email/confirmar.html');
            $mail->Body = $cuerpo;

            // Enviar correo
            $mail->send();
            echo 'El mensaje ha sido enviado';
        }
    } catch (Exception $e) {
        session_start();
        echo 'Excepción capturada: ' . $e->getMessage() . '<br>';
        echo 'Información sobre el error del PHPMailer: ' . $mail->ErrorInfo . '<br>';
    }
} else {
    $_SESSION['mensaje'] = 'Las contraseñas no coinciden';
    $_SESSION['icono'] = 'warning';
    header('Location: ' . APP_URL . "admin/usuarios/create.php");
    exit();
}
?>
