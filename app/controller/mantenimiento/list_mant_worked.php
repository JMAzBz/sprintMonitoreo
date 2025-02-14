<?php
$sql_mantenimiento    = "SELECT * FROM mantenimiento_worked as mk
INNER JOIN mantenimientos as m ON mk.mant_fk = m.id_mant
INNER JOIN productos AS p ON m.producto_fk = p.product_id
INNER JOIN producto_categoria ON p.catg_fk = producto_categoria.p_catg_id
INNER JOIN usuarios AS usu ON usu.id_user = m.responsable
WHERE m.estado = 1;";
$query_mantenimiento  = $pdo->prepare($sql_mantenimiento);
$query_mantenimiento->execute();
$mantenimiento = $query_mantenimiento->fetchAll(PDO::FETCH_ASSOC);