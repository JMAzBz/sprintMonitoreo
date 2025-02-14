<?php
$sql_personas    = "SELECT * FROM personas WHERE estado = 1";
$query_personas  = $pdo->prepare($sql_personas);
$query_personas->execute();
$personas = $query_personas->fetchAll(PDO::FETCH_ASSOC);
?>