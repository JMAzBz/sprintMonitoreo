<?php
$sql_insidencias    = "SELECT * FROM insidencias
INNER JOIN responsables ON insidencias.fk_responsable = responsables.id_rspn
INNER JOIN categorias ON insidencias.fk_categoria = categorias.id_catg WHERE insidencias.estado = TRUE";
$query_insidencias  = $pdo->prepare($sql_insidencias);
$query_insidencias->execute();
$insidencias = $query_insidencias->fetchAll(PDO::FETCH_ASSOC);
?>