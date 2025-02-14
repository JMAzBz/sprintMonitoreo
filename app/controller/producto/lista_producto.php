<?php
$sql_productos    = "SELECT * FROM almacenes
INNER JOIN usuarios  ON usuarios.id_user           = almacenes.reception_fk
INNER JOIN productos ON almacenes.product_fk       = productos.product_id
INNER JOIN producto_categoria ON productos.catg_fk = producto_categoria.id_pcat
INNER JOIN producto_marca ON productos.marca_fk    = producto_marca.id_marca
WHERE almacenes.estado = 1;";
$query_productos  = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);


$sql_equipos    = "SELECT * FROM almacenes
INNER JOIN usuarios  ON usuarios.id_user           = almacenes.reception_fk
INNER JOIN productos ON almacenes.product_fk       = productos.product_id
INNER JOIN producto_categoria ON productos.catg_fk = producto_categoria.id_pcat
INNER JOIN producto_marca ON productos.marca_fk    = producto_marca.id_marca
WHERE almacenes.estado = 1;";
$query_equipos = $pdo->prepare($sql_equipos);
$query_equipos->execute();
$equipos = $query_equipos->fetchAll(PDO::FETCH_ASSOC);


?>