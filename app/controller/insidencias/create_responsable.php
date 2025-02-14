<?php
include('../../config.php');
$area = $_POST['area'];

session_start();

if($area == ""){
    $_SESSION['mensaje'] = 'Campos vacios';
    $_SESSION['icono'] = 'warning';
    header('Location:'.APP_URL.'admin/responsables/create.php');
}else{
$sentencia = $pdo->prepare("INSERT INTO responsables (area,insert_at,estado) VALUES (UPPER(?),now(),TRUE)");
$sentencia->bindValue(1, $area);
try{
if($sentencia->execute()){
    $_SESSION['mensaje'] = 'Los datos fueron registrados correctamente';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL.'admin/responsables');
}else{
    $_SESSION['mensaje'] = 'Error al registrar datos';
    $_SESSION['icono'] = 'warning';
    header('Location:'.APP_URL.'admin/responsables/create.php');
}
}catch (Exception $e) {
    $_SESSION['mensaje'] = 'Error al registrar datos'.$e->getMessage();
    $_SESSION['icono'] = 'warning';
    header('Location:'.APP_URL.'admin/responsables/create.php');
}
}

?>