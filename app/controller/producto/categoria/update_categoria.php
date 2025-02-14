<?php
include('../../../config.php');

echo $catg_nom = $_POST['catg_nom'];
echo $catg_id   = $_POST['id_pcat'];
session_start();
if ($catg_nom == "") {
    header('Location:' . APP_URL . 'admin/productos/categorias/edit.php?id=' . $catg_id);
    exit();
}

try {
    $actualizar = $pdo->prepare("UPDATE producto_categoria SET categoria = UPPER(?), update_at = now() WHERE id_pcat = ?");
    $actualizar->bindValue(1, $catg_nom, PDO::PARAM_INT);
    $actualizar->bindValue(2, $catg_id, PDO::PARAM_STR);    
    $_SESSION['mensaje'] = 'Los datos fueron Modificados correctamente';
    $_SESSION['icono'] = 'success';
    $actualizar->execute(); 
    header('Location:' . APP_URL . 'admin/productos/categorias/categoria.php');
    exit();
} catch (Exception $e) {
    echo 'erro'.$e->getMessage();
    // $_SESSION['mensaje'] = 'Error al registrar en la base de datos';
    // $_SESSION['icono'] = 'error';
    // header('Location:' . APP_URL . 'admin/productos/categorias/edit.php?id=' . $catg_id);
    // exit();
}
?>
