<?php
include('../../config.php');
session_start();
$email = $_POST['email'];
$user_pass = $_POST['password'];


$sentecia = $pdo->prepare("SELECT * FROM usuarios WHERE user_email = ? AND user_pass = crypt(?,user_pass)");
$sentecia->bindParam(1,$email);
$sentecia->bindParam(2,$user_pass);
$sentecia->execute();
$respuesta = $sentecia->fetchAll(PDo::FETCH_ASSOC);

if($respuesta){
        $_SESSION['mensaje'] = 'Bienvenido al sistema';
        $_SESSION['icono'] = 'success';
        $_SESSION['email']   = $email;
        header('Location:'.APP_URL.'/admin/insidencias');
}else{
        $_SESSION['mensaje'] = 'Credenciales incorrectas';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL);
}