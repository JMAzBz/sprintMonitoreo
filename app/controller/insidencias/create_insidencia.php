<?php
include('../../config.php');
$evento      = $_POST['evento'];
$descripcion = $_POST['descripcion'];
$nv_critico  = $_POST['nv_critico'];
$id_catg     = $_POST['id_catg'];
$etapa       = $_POST['etapa'];
$area        = $_POST['area'];
session_start();


$sentencia = $pdo->prepare("INSERT INTO insidencias (evento,descripcion,nv_critico,fk_categoria,etapa,fk_responsable,insert_at,estado,fecha) VALUES (UPPER(?),UPPER(?),UPPER(?),?,UPPER(?),?,now(),TRUE,now())");
$sentencia->bindValue(1, $evento);
$sentencia->bindValue(2, $descripcion);
$sentencia->bindValue(3, $nv_critico);
$sentencia->bindValue(4, $id_catg);
$sentencia->bindValue(5, $etapa);
$sentencia->bindValue(6, $area);

    try{
    if($sentencia->execute()){
        $_SESSION['mensaje'] = 'Los datos fueron creados correctamente';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL.'admin/insidencias');
    }else{
        $_SESSION['mensaje'] = 'Error al modificar';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL.'admin/insidencias/create.php');
    }
    }catch (Exception $e) {
        $_SESSION['mensaje'] = 'Error al modificar'.$e->getMessage();
        $_SESSION['icono'] = 'error';
    }


?>