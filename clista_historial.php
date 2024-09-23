<?php
include_once "mclase.php";
$Con=new Conexion();
$Con->Conectar();
$idcli=htmlspecialchars($_SESSION["username"]);
$sql="SELECT pro.pro_nombre,pro.pro_estado,pro.pro_imagen,pro.pro_precio,pe.cantidad,pe.cantidad*pro.pro_precio,pe.estado,date_format(pe.fecha,'%d-%m-%Y') as fecha,pe.hora,pe.pago
FROM producto pro,pedido pe
WHERE pro.id_producto=pe.id_producto and pe.id_cliente='".$idcli."' and (pe.estado='pagado' or pe.estado='procesando')
order by pe.id_pedido desc;";
$data=$Con->pruebasq($sql);

?>