<?php
include('../../config.php');
$p_id_get     = $_POST['id_persona'];

session_start();


$sentencia = $pdo->prepare("UPDATE personas
                            SET estado = 0 WHERE id_persona = ? ");
$sentencia->bindValue(1, $p_id_get);

try{
if($sentencia->execute()){
    $_SESSION['mensaje'] = 'Los datos fueron borrrados correctamente';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL.'admin/contactos');
}else{
    $_SESSION['mensaje'] = 'Error al borrar en la base de datos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL.'admin/contactos');
}
}catch (Exception $e) {
    echo 'error'.$e->getMessage();
}
?>