<?php
    $query_receptor  = $pdo->prepare("SELECT * FROM usuarios 
    INNER JOIN personas ON usuarios.persona_fk = personas.id_persona
    WHERE usuarios.estado = TRUE AND user_email = ?");
$query_receptor->bindParam(1,$email);
$query_receptor->execute();
$receptor = $query_receptor->fetchAll(PDO::FETCH_ASSOC);
foreach($receptor AS $datos_r){
        $email_r     = $datos_r['user_email'];
        $nombre_r    = $datos_r['nombre'];
        $apellido_r  = $datos_r['apellido'];
        $ruc_r       = $datos_r['ruc'];
        $celular_r   = $datos_r['celular'];
        $id_user     = $datos_r['id_user'];
}