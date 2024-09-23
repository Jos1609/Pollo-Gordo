<?php
include_once "mclase.php";
$Con=new Conexion();
$Con->Conectar();
$idcli=htmlspecialchars($_SESSION["username"]);
$sql="SELECT pe.id_pedido,pro.pro_nombre,pro.pro_estado,pro.pro_imagen,pro.pro_precio,pe.cantidad,pe.pago,pro.descuento
FROM producto pro,pedido pe
WHERE pro.id_producto=pe.id_producto and pe.id_cliente='".$idcli."' and pe.estado='carrito'
order by pe.id_pedido desc;";
$data=$Con->pruebasq($sql);

?>