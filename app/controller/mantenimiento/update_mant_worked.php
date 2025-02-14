<?php
include('../../config.php');
$id_mant_w = $_POST['id_mant'];
$fase = "FINALIZADO";
session_start();
        $sentencia = $pdo->prepare("UPDATE mantenimiento_worked SET update_at = now(), fase = ? WHERE id_worked = ?");
        $sentencia->bindValue(1, $fase);
        $sentencia->bindValue(2, $id_mant_w);
        
        if ($sentencia->execute()) {
            $_SESSION['mensaje'] = 'Los datos fueron creados correctamente';
            $_SESSION['icono'] = 'success';
            header('Location:' . APP_URL . '/admin/mantenimiento/mantenimineto_worked/index.php');
            exit();
        } else {
            throw new Exception('Error al ejecutar el procedimiento almacenado.');
        }
