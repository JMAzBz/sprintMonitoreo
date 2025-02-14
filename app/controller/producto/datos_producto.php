<?php
$query_productos = $pdo->prepare("SELECT * FROM almacenes
INNER JOIN usuarios ON usuarios.id_user = almacenes.reception_fk
INNER JOIN productos ON almacenes.product_fk = productos.product_id
INNER JOIN producto_categoria ON productos.catg_fk = producto_categoria.p_catg_id
WHERE almacenes.id_almacen = ?");
$query_productos->bindValue(1, $prod_id_get);
$query_productos->execute();
$productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach ($productos as $datos){
    $p_nom          = $datos['nombre'];
    $p_descripcion  = $datos['descripcion'];
    $p_tipo         = $datos['tipo'];
    $categoria      = $datos['categoria'];
    $unidad_md      = $datos['unidad_md'];
    $stock          = $datos['stock'];
    $proveedor      = $datos['proveedor'];
    $venta_price    = $datos['venta_price'];
    $costo_price    = $datos['costo_price'];
    $mfg_date       = $datos['mfg_date'];
    $exp_date       = $datos['exp_date'];
    $reception_at   = $datos['reception_at'];
    $code_alm       = $datos['code_alm'];
    $stock          = $datos['stock'];
    $proveedor      = $datos['proveedor'];
    $venta_price    = $datos['venta_price'];
    $costo_price    = $datos['costo_price'];
    $deposito       = $datos['deposito'];
    $product_fk     = $datos['product_fk'];
}
?>