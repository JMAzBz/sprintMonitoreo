<?php
$sql_usuarios    = "SELECT * FROM usuarios 
INNER JOIN personas ON usuarios.persona_fk = personas.id_persona
WHERE usuarios.estado = TRUE";
$query_usuarios  = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
?>