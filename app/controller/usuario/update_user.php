<?php
session_start();
include('../../config.php');
$id_user = $_POST['id_user'];
$user_email = $_POST['user_email'];
$user_pass = $_POST['user_pass'];
$pass_repeat = $_POST['pass_repeat'];


if (empty($user_email) || empty($user_pass) || empty($pass_repeat)) {
    $_SESSION['mensaje'] = 'Todos los campos son obligatorios';
    $_SESSION['icono'] = 'warning';
    header('Location: ' . APP_URL . "admin/usuarios/create.php");
    exit();
} else {
    if ($user_pass === $pass_repeat) {

        $sentencia = $pdo->prepare("UPDATE usuarios SET user_email = ?, user_pass = crypt(?,gen_salt('bf')), update_at = now() WHERE id_user = ?");
        $sentencia->bindParam(1, $user_email, PDO::PARAM_STR);
        $sentencia->bindParam(2, $user_pass, PDO::PARAM_STR);
        $sentencia->bindParam(3, $id_user, PDO::PARAM_STR);
        try {
            if ($sentencia->execute()) {

                $_SESSION['mensaje'] = 'Los datos fueron registrados correctamente';
                $_SESSION['icono'] = 'success';
                header('Location:' . APP_URL . 'admin/usuarios');
            }
        } catch (Exception $e) {
            session_start();
            $_SESSION['mensaje'] = 'Error datos ya registrados en la base de datos';
            $_SESSION['icono'] = 'error';
            header('Location:' . APP_URL . '/admin/usuarios/create.php');
        }
    } else {
        $_SESSION['mensaje'] = 'Las contraseñas no coinciden';
        $_SESSION['icono'] = 'warning';
        header('Location: ' . APP_URL . "admin/usuarios/create.php");
        exit();
    }
}