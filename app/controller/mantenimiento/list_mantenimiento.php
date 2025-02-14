<?php
$sql_mantenimiento    = "SELECT * FROM mantenimientos as m
INNER JOIN productos AS p ON m.producto_fk = p.product_id
INNER JOIN producto_categoria ON p.catg_fk = producto_categoria.p_catg_id
INNER JOIN usuarios AS usu ON usu.id_user = m.responsable
INNER JOIN almacenes AS alm ON alm.product_fk = p.product_id
WHERE m.estado = 1;";
$query_mantenimiento  = $pdo->prepare($sql_mantenimiento);
$query_mantenimiento->execute();
$mantenimiento = $query_mantenimiento->fetchAll(PDO::FETCH_ASSOC);