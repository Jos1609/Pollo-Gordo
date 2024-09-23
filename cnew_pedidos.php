<?php
include_once "mclase.php";
$Con=new Conexion();
$Con->Conectar();
$sql="SELECT c.cli_nom,c.cli_ape,pe.id_pedido,pro.pro_nombre,pro.pro_estado,pro.pro_imagen,pro.pro_precio,pe.cantidad,pe.cantidad*pro.pro_precio,pe.estado,date_format(pe.fecha,'%d-%m-%Y') as fecha,pe.hora,pe.pago,pe.tipo_pago
FROM producto pro,pedido pe,cliente c
WHERE pro.id_producto=pe.id_producto and c.id_cliente=pe.id_cliente and pe.estado='procesando'
order by pe.id_pedido desc;";
$data=$Con->pruebasq($sql);

?>