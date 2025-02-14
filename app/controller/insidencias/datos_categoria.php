<?php
$sql_categorias = "SELECT * FROM categorias WHERE estado = TRUE AND id_catg = ?";
$query_categorias = $pdo->prepare($sql_categorias);
$query_categorias->bindValue(1, $catg_id);
$query_categorias->execute();
$categoria = $query_categorias->fetchAll(PDO::FETCH_ASSOC);

foreach ($categoria as $datos) {
    $nombre_catg = $datos['categoria'];
    $insert_at   = $datos['insert_at'];
}
