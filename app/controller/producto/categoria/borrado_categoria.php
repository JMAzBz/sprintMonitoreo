<?php
include('../../../config.php');
$id_catg = $_POST['id_pcat'];


    $sentencia = $pdo->prepare("DELETE FROM producto_categoria WHERE id_pcat = ?");
    $sentencia->bindValue(1, $id_catg);

        if ($sentencia->execute()) {
            $_SESSION['mensaje'] = 'Los datos fueron actualizados correctamente';
            $_SESSION['icono'] = 'success';
            header('Location:' . APP_URL . 'admin/productos/categorias/categoria.php');
        } else {
            $_SESSION['mensaje'] = 'Error al registrar, vuelva a intentar o comuniquese con el administrador';
            $_SESSION['icono'] = 'error';
            header('Location:' . APP_URL . 'admin/productos/categorias/categoria.php');
        }
?>