<?php
include('../../config.php');

echo $respn   = $_POST['id_rspn'];
session_start();
try {
    $actualizar = $pdo->prepare("UPDATE responsables SET estado = false, update_at = now() WHERE id_rspn = ?");
    $actualizar->bindValue(1, $respn, PDO::PARAM_STR);
    $actualizar->execute();
    header('Location:' . APP_URL . 'admin/responsables');
    exit();
} catch (Exception $e) {
    header('Location:' . APP_URL . 'admin/responsables/edit.php?id=' . $respn);
    exit();
}
?>
