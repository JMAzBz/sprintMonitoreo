<?php
include('../../config.php');
$id_insid = $_POST['id_insid'];


    $sentencia = $pdo->prepare("UPDATE insidencias 
                            SET estado = FALSE, update_at = now() WHERE id_insd = ?");
    $sentencia->bindValue(1, $id_insid);

        if ($sentencia->execute()) {
            $_SESSION['mensaje'] = 'Los datos fueron actualizados correctamente';
            $_SESSION['icono'] = 'success';
            header('Location:' . APP_URL . 'admin/insidencias/index.php');
        } else {
            $_SESSION['mensaje'] = 'Error al registrar, vuelva a intentar o comuniquese con el administrador';
            $_SESSION['icono'] = 'error';
            header('Location:' . APP_URL . 'admin/insidencias/index.php');
        }
?>