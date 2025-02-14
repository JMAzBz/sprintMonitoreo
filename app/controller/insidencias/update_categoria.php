<?php
include('../../config.php');

$catg_nom = $_POST['catg_nom'];
$catg_id   = $_POST['catg_id'];
session_start();
if ($catg_nom == "") {
    header('Location:' . APP_URL . 'admin/categoria/edit.php?id=' . $catg_id);
    exit();
}

try {
    $actualizar = $pdo->prepare("UPDATE categorias SET categoria = UPPER(?), update_at = now() WHERE id_catg = ?");
    $actualizar->bindValue(1, $catg_nom, PDO::PARAM_INT);
    $actualizar->bindValue(2, $catg_id, PDO::PARAM_STR);    
    $_SESSION['mensaje'] = 'Los datos fueron Modificados correctamente';
    $_SESSION['icono'] = 'success';
    $actualizar->execute(); 
    header('Location:' . APP_URL . 'admin/categoria');
    exit();
} catch (Exception $e) {
    $_SESSION['mensaje'] = 'Error al registrar en la base de datos';
    $_SESSION['icono'] = 'error';
    header('Location:' . APP_URL . 'admin/categoria/edit.php?id=' . $catg_id);
    exit();
}
?>
