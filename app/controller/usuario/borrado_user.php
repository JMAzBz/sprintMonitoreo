<?php

include('../../config.php');
$id_user = $_POST['id_user'];

$sentencia = $pdo->prepare("UPDATE usuarios SET estado = false, update_at = now() WHERE id_user = ?");
$sentencia->bindParam(1, $id_user, PDO::PARAM_STR);
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