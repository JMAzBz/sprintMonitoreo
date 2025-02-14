<?php
include('../../config.php');
$id_almacen = $_POST['id_almacen'];
session_start();

$sentencia = $pdo->prepare("UPDATE almacenes 
                            SET estado = 2, update_at = now() WHERE id_almacen = ?");
$sentencia->bindParam(1,$id_almacen);

try{
if($sentencia->execute()){
    $_SESSION['mensaje'] = 'Los datos fueron registrados correctamente';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL.'admin/productos/index.php');
}else{
    $_SESSION['mensaje'] = 'Error al registrar en la base de datos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL.'admin/productos/index.php');
}
}catch (Exception $e) {
    echo 'error'.$e->getMessage();
}