<?php
include('../../config.php');
$p_name       = $_POST['p_name'];
$p_last_name  = $_POST['p_last_name'];
$p_dni        = $_POST['p_dni'];
$p_celular    = $_POST['p_celular'];
$p_correo     = $_POST['p_correo'];
$p_ruc        = $_POST['p_ruc'];

session_start();


$sentencia = $pdo->prepare("INSERT INTO personas (nombre,apellido,dni,ruc,celular,correo,insert_at,estado) 
                            VALUES (UPPER(?),UPPER(?),?,?,?,?,now(),1)");
$sentencia->bindValue(1, $p_name);
$sentencia->bindValue(2, $p_last_name);
$sentencia->bindValue(3, $p_dni);
$sentencia->bindValue(4, $p_ruc);
$sentencia->bindValue(5, $p_celular);
$sentencia->bindValue(6, $p_correo);

try{
if($sentencia->execute()){
    $_SESSION['mensaje'] = 'Los datos fueron registrados correctamente';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL.'admin/contactos');
}else{
    $_SESSION['mensaje'] = 'Error al registrar en la base de datos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL.'admin/contactos/create.php');
}
}catch (Exception $e) {
    echo 'error'.$e->getMessage();
}
?>