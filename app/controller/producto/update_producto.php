<?php
include('../../config.php');
$p_name         = $_POST['p_name'];
$descripcion    = $_POST['descripcion'];
$tipo_p         = $_POST['tipo_p'];
$p_catg_id      = $_POST['p_catg_id'];
$unidad_md      = $_POST['unidad_md'];
$mfg_date       = $_POST['mfg_date'];
$exp_date       = $_POST['exp_date'];
$reception_at   = $_POST['reception_at'];
$code_alm       = $_POST['code_alm'];
$deposito       = $_POST['deposito'];
$stock          = $_POST['stock'];
$proveedor      = $_POST['proveedor'];
$p_compra       = $_POST['p_compra'];
$p_venta        = $_POST['p_venta'];
$product_fk     = $_POST['product_fk'];
$id_almacen     = $_POST['id_almacen'];
session_start();

$pdo->beginTransaction();

$sentencia = $pdo->prepare("UPDATE productos 
                            SET nombre = UPPER(?), descripcion = ?, tipo = ?, catg_fk = ?, unidad_md = ?,
                            mfg_date = ?,exp_date = ?,update_at = now() WHERE product_id = ?");
$sentencia->bindValue(1, $p_name);       
$sentencia->bindValue(2, $descripcion);  
$sentencia->bindValue(3, $tipo_p);       
$sentencia->bindValue(4, $p_catg_id);    
$sentencia->bindValue(5, $unidad_md);    
$sentencia->bindValue(6, $mfg_date);    
$sentencia->bindValue(7, $exp_date);    
$sentencia->bindValue(8, $product_fk);    
$sentencia->execute();

$sentencia = $pdo->prepare("UPDATE almacenes 
                            SET stock = ?, deposito = ?, venta_price = ?, costo_price = ?,reception_at = ?,
                            code_alm = ? ,proveedor = UPPER(?), update_at = now() WHERE id_almacen = ?");
$sentencia->bindParam(1,$stock);
$sentencia->bindParam(2,$deposito);
$sentencia->bindParam(3,$p_venta);
$sentencia->bindParam(4,$p_compra);
$sentencia->bindParam(5,$reception_at);
$sentencia->bindParam(6,$code_alm);
$sentencia->bindParam(7,$proveedor);
$sentencia->bindParam(8,$id_almacen);
$sentencia->execute();

$sentencia = $pdo->prepare("
    UPDATE almacenes alm
    SET vida_util = (
        SELECT CONCAT(
            FLOOR(EXTRACT(YEAR FROM AGE(p.exp_date, CURRENT_DATE)) * 12 + EXTRACT(MONTH FROM AGE(p.exp_date, CURRENT_DATE))), ' MESES ',
            EXTRACT(DAY FROM AGE(p.exp_date, CURRENT_DATE)), ' DIAS')
        FROM productos p
        WHERE alm.product_fk = p.product_id
    )
    WHERE alm.id_almacen = :id_almacen
");

$sentencia->bindParam(':id_almacen', $id_almacen, PDO::PARAM_INT);

    try{
    if($sentencia->execute()){
        $pdo->commit();
        $_SESSION['mensaje'] = 'Los datos fueron creados correctamente';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL.'admin/productos/index.php');
    }
    }catch (Exception $e) {
        echo 'eror'.$e->getMessage();
    }


?>