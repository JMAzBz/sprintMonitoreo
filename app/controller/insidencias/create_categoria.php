<?php
include('../../config.php');
echo    $cat_nom = $_POST['cat_nom'];

session_start();

if($cat_nom == ""){
    $_SESSION['mensaje'] = 'Campos vacios';
    $_SESSION['icono']   = 'warning';
    header('Location:'.APP_URL.'admin/categoria/create.php');
}else{
$sentencia = $pdo->prepare("INSERT INTO categorias (categoria,insert_at,estado) VALUES (UPPER(?),now(),TRUE)");
$sentencia->bindValue(1, $cat_nom);

try{
if($sentencia->execute()){
    $_SESSION['mensaje'] = 'Los datos fueron registrados correctamente';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL.'admin/categoria');
}else{
    $_SESSION['mensaje'] = 'Error al registrar en la base de datos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL.'admin/categoria/create.php');
}
}catch (Exception $e) {
    header('Location:'.APP_URL.'admin/categoria/create.php');
}
}

?>