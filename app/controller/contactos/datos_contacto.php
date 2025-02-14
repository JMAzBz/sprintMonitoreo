<?php
$query_personas = $pdo->prepare("SELECT * FROM personas WHERE estado = 1 AND id_persona = ?"); 
$query_personas->bindValue(1,$id_persona_get);
$query_personas->execute();
$personas = $query_personas->fetchAll(PDO::FETCH_ASSOC);
foreach ($personas as $datos_p) {
    $nombres  = $datos_p['nombre'];
    $apellido = $datos_p['apellido'];
    $ruc      = $datos_p['ruc'];
    $dni      = $datos_p['dni'];
    $celular  = $datos_p['celular'];
    $correo   = $datos_p['correo'];
}
?>