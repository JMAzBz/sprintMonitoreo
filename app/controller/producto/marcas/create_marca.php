<?php
include('../../../config.php');
echo $marca_p = $_POST['marca_p'];

session_start();

if($marca_p == ""){
    $_SESSION['mensaje'] = 'Campos vacios';
    $_SESSION['icono']   = 'warning';
    header('Location:'.APP_URL.'admin/productos/marcas/create.php');
}else{

$sentencia = $pdo->prepare("INSERT INTO producto_marca (marca,insert_at,estado) VALUES (UPPER(?),now(),1)");
$sentencia->bindValue(1, $marca_p);

try{
if($sentencia->execute()){
    $_SESSION['mensaje'] = 'Los datos fueron registrados correctamente';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL.'admin/productos/marcas/index.php');
}else{
    $_SESSION['mensaje'] = 'Error al registrar en la base de datos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL.'admin/producto/marcas/create.php');
}
}catch (Exception $e) {
    echo 'error'.$e->getMessage();
}
}
?>