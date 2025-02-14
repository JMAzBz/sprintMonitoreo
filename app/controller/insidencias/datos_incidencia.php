<?php
$sql_insidencias = "SELECT * FROM insidencias
INNER JOIN responsables ON insidencias.fk_responsable = responsables.id_rspn
INNER JOIN categorias ON insidencias.fk_categoria = categorias.id_catg 
WHERE insidencias.estado = TRUE AND id_insd = ?";
$query_insidencias = $pdo->prepare($sql_insidencias);
$query_insidencias->bindValue(1, $insid_id);
$query_insidencias->execute();
$incidencia = $query_insidencias->fetchAll(PDO::FETCH_ASSOC);

foreach ($incidencia as $datos) {
    $evento         = $datos['evento'];
    $descripcion    = $datos['descripcion'];
    $nv_critico     = $datos['nv_critico'];
    $categoria      = $datos['categoria'];
    $fk_categoria   = $datos['fk_categoria'];
    $fk_respnsable  = $datos['fk_responsable'];
    $fecha          = $datos['fecha'];
    $etapa          = $datos['etapa'];
}
