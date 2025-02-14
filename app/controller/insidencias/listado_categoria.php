<?php
$sql_categorias    = "SELECT * FROM categorias WHERE estado = TRUE";
$query_categorias  = $pdo->prepare($sql_categorias);
$query_categorias->execute();
$categorias = $query_categorias->fetchAll(PDO::FETCH_ASSOC);
?>