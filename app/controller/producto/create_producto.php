<?php
include('../../config.php');
$receptor_id    = $_POST['receptor_id'];
$p_name         = $_POST['p_name'];
$descripcion    = $_POST['descripcion'];
$tipo_p         = $_POST['tipo_p'];
$p_catg_id      = $_POST['p_catg_id'];
$p_marca_id     = $_POST['p_marca_id'];
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
session_start();

$pdo->beginTransaction();

$sentencia = $pdo->prepare("INSERT INTO productos (nombre, descripcion, tipo, catg_fk,marca_fk,unidad_md,
                            mfg_date,exp_date,insert_at, estado)
                            VALUES (UPPER(?), UPPER(?), UPPER(?),?,?,?,?,?,now(),1) RETURNING product_id");
$sentencia->bindValue(1, $p_name);
$sentencia->bindValue(2, $descripcion);
$sentencia->bindValue(3, $tipo_p);
$sentencia->bindValue(4, $p_catg_id);
$sentencia->bindValue(5, $p_marca_id);
$sentencia->bindValue(6, $unidad_md);
$sentencia->bindValue(7, $mfg_date);
$sentencia->bindValue(8, $exp_date);
$sentencia->execute();
$id_producto = $sentencia->fetch(PDO::FETCH_ASSOC)['product_id'];

$sentencia = $pdo->prepare("INSERT INTO almacenes (product_fk,stock,deposito,venta_price,costo_price,reception_at,code_alm,proveedor,insert_at,estado,reception_fk)
                            VALUES (?,?,?,?,?,?,?,UPPER(?),now(),1,?) RETURNING id_almacen");
$sentencia->bindParam(1, $id_producto);
$sentencia->bindParam(2, $stock);
$sentencia->bindParam(3, $deposito);
$sentencia->bindParam(4, $p_venta);
$sentencia->bindParam(5, $p_compra);
$sentencia->bindParam(6, $reception_at);
$sentencia->bindParam(7, $code_alm);
$sentencia->bindParam(8, $proveedor);
$sentencia->bindParam(9, $receptor_id);
$sentencia->execute();
$id_almacen = $sentencia->fetch(PDO::FETCH_ASSOC)['id_almacen'];


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
$sentencia->execute();


$sentencia = $pdo->prepare("
UPDATE productos as p
SET valor_actual = a.costo_price * a.stock
FROM almacenes a
WHERE p.product_id = a.product_fk
AND a.id_almacen = ?;
");
$sentencia->bindParam(1, $id_almacen);
$sentencia->execute();




try {
    if ($sentencia->execute()) {
        $pdo->commit();
        $_SESSION['mensaje'] = 'Los datos fueron creados correctamente';
        $_SESSION['icono'] = 'success';
        header('Location:' . APP_URL . 'admin/productos/index.php');
    }
} catch (Exception $e) {
    echo 'eror' . $e->getMessage();
}
