<?php
require_once('../../config.php');
session_start();
$evento        = $_POST['evento'];
$descripcion   = $_POST['descripcion'];
$nv_critico    = $_POST['nv_critico'];
$id_catg       = $_POST['id_catg'];
$insidencia_id = $_POST['insidencia_id'];
$etapa         = $_POST['etapa'];
$id_rspn         = $_POST['id_rspn'];

if($evento == "" || $descripcion == "" || $nv_critico == "" || $id_catg == ""){
    header('Location:'.APP_URL.'/admin/insidencias/edit.php');
}else{
$sentencia = $pdo->prepare("UPDATE insidencias 
                            SET evento = UPPER(?), descripcion = UPPER(?), nv_critico = UPPER(?), fk_categoria = ?, etapa = UPPER(?), fk_responsable = ?, update_at = now() WHERE id_insd = ?");
$sentencia->bindValue(1, $evento);
$sentencia->bindValue(2, $descripcion);
$sentencia->bindValue(3, $nv_critico);
$sentencia->bindValue(4, $id_catg);
$sentencia->bindValue(5, $etapa);
$sentencia->bindValue(6, $id_rspn);
$sentencia->bindValue(7, $insidencia_id);

try{
if($sentencia->execute()){
    $_SESSION['mensaje'] = 'Los datos fueron Modificados correctamente';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL.'admin/insidencias');
}else{
    $_SESSION['mensaje'] = 'Error al registrar en la base de datos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL.'admin/insidencias/create.php');
}
}catch (Exception $e) {
    $_SESSION['mensaje'] = 'Error al registrar en la base de datos'.$e;
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL.'admin/insidencias');
}
}

?>