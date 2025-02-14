<?php
$query_usuarios  = $pdo->prepare("SELECT * FROM usuarios 
INNER JOIN personas ON usuarios.persona_fk = personas.id_persona
WHERE usuarios.estado = TRUE AND id_user = ?");
$query_usuarios->bindParam(1,$get_user);
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios AS $datos_user){
        $email_user = $datos_user['user_email'];
        $nombre     = $datos_user['nombre'];
        $apellido   = $datos_user['apellido'];
        $dni        = $datos_user['dni'];
        $ruc        = $datos_user['ruc'];
        $celular        = $datos_user['celular'];
}

?>