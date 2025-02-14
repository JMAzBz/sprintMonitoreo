<?php
$sql_categorias    = "SELECT * FROM producto_categoria WHERE estado = 1";
$query_categorias  = $pdo->prepare($sql_categorias);
$query_categorias->execute();
$categorias = $query_categorias->fetchAll(PDO::FETCH_ASSOC);
?>