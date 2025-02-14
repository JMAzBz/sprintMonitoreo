<?php
include('../../config.php');

$area = $_POST['area'];
$respn   = $_POST['respn'];
session_start();
if ($area == "") {
    header('Location:' . APP_URL . 'admin/categoria/edit.php?id=' . $respn);
    exit();
}

try {
    $_SESSION['mensaje'] = 'Datos actualizados correctamente';
    $_SESSION['icono'] = 'success';
    $actualizar = $pdo->prepare("UPDATE responsables SET area = UPPER(?), update_at = now() WHERE id_rspn = ?");
    $actualizar->bindValue(1, $area, PDO::PARAM_STR);
    $actualizar->bindValue(2, $respn, PDO::PARAM_STR);
    $actualizar->execute();
    header('Location:' . APP_URL . 'admin/responsables');
    exit();
} catch (Exception $e) {
    $_SESSION['mensaje'] = 'Error al registrar datos';
    $_SESSION['icono'] = 'error';
    header('Location:' . APP_URL . 'admin/responsables/edit.php?id=' . $respn);
    exit();
}
?>
