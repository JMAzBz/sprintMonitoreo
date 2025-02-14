<?php
include('../../config.php');
$equipo_fk      =  $_POST['equipo_fk'];
$tipo_m         =  $_POST['tipo_m'];
$exp_date       =  $_POST['exp_date'];
$arranq_date    = $_POST['arranq_date'];
$frecuencia_m   = $_POST['frecuencia_m'];
$id_responsable = $_POST['id_responsable'];
$delegador      = $_POST['delegador'];
session_start();

try {
    if($tipo_m == "PREVENTIVO"){
        $pdo->beginTransaction();
        $tipo = "PENDIENTE";

        $sentencia = $pdo->prepare("INSERT INTO mantenimientos (producto_fk, tipo, arranque_at, fecuencia_mnt, insert_at, delegador, responsable, estado)
                                    VALUES (?,?,?,?,now(),?,?,1) RETURNING id_mant");
        $sentencia->bindValue(1, $equipo_fk);
        $sentencia->bindValue(2, $tipo);
        $sentencia->bindValue(3, $arranq_date);
        $sentencia->bindValue(4, $frecuencia_m);
        $sentencia->bindValue(5, $delegador);
        $sentencia->bindValue(6, $id_responsable);
        $sentencia->execute();
        $id_mant = $sentencia->fetch(PDO::FETCH_ASSOC)['id_mant'];

        $sentencia = $pdo->prepare("SELECT insertar_mantenimientos(?,?)");
        $sentencia->bindParam(1, $id_mant);
        $sentencia->bindParam(2, $tipo);
        
        if ($sentencia->execute()) {
            $pdo->commit();
            $_SESSION['mensaje'] = 'Los datos fueron creados correctamente';
            $_SESSION['icono'] = 'success';
            header('Location:' . APP_URL . '/admin/mantenimiento');
            exit();
        } else {
            throw new Exception('Error al ejecutar el procedimiento almacenado.');
        }
    } else {
        $pdo->beginTransaction();
        $tipo = "FINALIZADO";

        $sentencia = $pdo->prepare("INSERT INTO mantenimientos (producto_fk, tipo, arranque_at, fecuencia_mnt, insert_at, delegador, responsable, estado)
                                    VALUES (?,?,?,?,now(),?,?,1) RETURNING id_mant");
        $sentencia->bindValue(1, $equipo_fk);
        $sentencia->bindValue(2, $tipo);
        $sentencia->bindValue(3, $arranq_date);
        $sentencia->bindValue(4, $frecuencia_m);
        $sentencia->bindValue(5, $delegador);
        $sentencia->bindValue(6, $id_responsable);
        $sentencia->execute();
        $id_mant = $sentencia->fetch(PDO::FETCH_ASSOC)['id_mant'];

        $sentencia = $pdo->prepare("INSERT INTO mantenimiento_worked (worked_at,fase,mant_fk,estado) VALUES (now(),?,?,1)");
        $sentencia->bindParam(1, $tipo);
        $sentencia->bindParam(2, $id_mant);
        
        if ($sentencia->execute()) {
            $pdo->commit();
            $_SESSION['mensaje'] = 'Los datos fueron creados correctamente';
            $_SESSION['icono'] = 'success';
            header('Location:' . APP_URL . '/admin/mantenimiento');
            exit();
        } else {
            throw new Exception('Error al ejecutar el procedimiento almacenado.');
        }    
}
} catch (Exception $e) {
    $pdo->rollBack();
    echo 'Error: ' . $e->getMessage();
    // $_SESSION['mensaje'] = 'Ocurrió un error: ' . $e->getMessage();
    // $_SESSION['icono'] = 'error';
    // header('Location:' . APP_URL . '/admin/mantenimiento');
    // exit();
}
