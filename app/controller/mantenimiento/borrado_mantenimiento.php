<?php
include('../../config.php');
$id_mant = $_POST['id_mant'];
session_start();
        $pdo->beginTransaction();
        $sentencia = $pdo->prepare("UPDATE mantenimientos SET estado = 0 WHERE id_mant = ?");
        $sentencia->bindValue(1, $id_mant);
        $sentencia->execute();

        $sentencia = $pdo->prepare("UPDATE mantenimiento_worked SET estado = 0 WHERE mant_fk = ?");
        $sentencia->bindValue(1, $id_mant);
        
        if ($sentencia->execute()) {
            $pdo->commit();
            $_SESSION['mensaje'] = 'Los datos fueron creados correctamente';
            $_SESSION['icono'] = 'success';
            header('Location:' . APP_URL . '/admin/mantenimiento');
            exit();
        } else {
            throw new Exception('Error al ejecutar el procedimiento almacenado.');
        }