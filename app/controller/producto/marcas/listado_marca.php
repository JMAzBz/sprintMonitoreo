<?php
$sql_marca    = "SELECT * FROM producto_marca WHERE estado = 1";
$query_marca  = $pdo->prepare($sql_marca);
$query_marca->execute();
$marca = $query_marca->fetchAll(PDO::FETCH_ASSOC);
?>