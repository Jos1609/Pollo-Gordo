<?php
include_once "mclase.php";
$Con=new Conexion();
$Con->Conectar();
$sql="SELECT pro.pro_nombre,pro.pro_precio,pe.cantidad,pe.hora,pe.pago
FROM producto pro,pedido pe
WHERE pro.id_producto=pe.id_producto  and pe.estado='pagado';";
$data=$Con->pruebasq($sql);

?>