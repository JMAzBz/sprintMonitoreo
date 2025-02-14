<?php
$sql_categorias = "SELECT * FROM responsables WHERE estado = TRUE AND id_rspn = ?";
$query_categorias = $pdo->prepare($sql_categorias);
$query_categorias->bindValue(1, $resp_id);
$query_categorias->execute();
$categoria = $query_categorias->fetchAll(PDO::FETCH_ASSOC);

foreach ($categoria as $datos) {
    $area = $datos['area'];
    $insert_at   = $datos['insert_at'];
}
