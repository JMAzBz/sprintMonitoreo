<?php 

define('SERVIDOR','localhost');
define('USUARIO', 'postgres');
define('PASSWORD', '123');
define('BD', 'monitoreosprint');

define('APP_NAME', 'SPRINT MONITOREO');
define('APP_URL','http://localhost/monitoreo/');
define('KEY_API_MAPS','');


$servidor = "pgsql:dbname=".BD.";host=".SERVIDOR;

try{
    $pdo = new PDO($servidor, USUARIO, PASSWORD);
    // echo "conexion exitosa a la base de datos";
}catch(PDOException $e){
    print_r($e);
    echo "error no se pudo conectar a la base de datos";
}

date_default_timezone_set(timezoneId:"America/Asuncion");
$fechaHora = date(format:'Y-m-d H:i:s');
$fecha     = date(format: 'd-m-y');
$dia_actual   = date(format:'d');
$mes_actual   = date(format:'m');
$anio_actual  = date(format:'Y');
$estado = true;
// echo "el dia de hoy ".$dia_actual." en el mes de ".$mes_actual;
function obtenerIP() {
    foreach (['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR'] as $key) {
        if (isset($_SERVER[$key])) {
            $ip = $_SERVER[$key];
            break;
        }
    }

    if (isset($ip) && $ip == '::1') {
        $ip = '127.0.0.1';
    }

    return $ip ?? 'IP no encontrada';
}
$ip = obtenerIP();
