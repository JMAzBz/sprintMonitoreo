<?php
$sql_responsables    = "SELECT * FROM responsables WHERE estado = TRUE";
$query_responsables  = $pdo->prepare($sql_responsables);
$query_responsables->execute();
$responsables = $query_responsables->fetchAll(PDO::FETCH_ASSOC);
?>