<?php
include_once "mclase.php";
$conexion=new Conexion();
$conexion->Conectar();
$id=$_GET['id'];
$sql="select p.pro_nombre,p.pro_decripcion,p.pro_imagen,p.pro_precio,p.descuento,pe.cantidad,pe.id_pedido,p.descuento 
from pedido pe,producto p 
where pe.id_pedido=".$id." and pe.id_producto=p.id_producto;";
$xx=$conexion->pruebasq($sql);
$fil=mysqli_fetch_assoc($xx);
$nombre=$fil['pro_nombre'];
$precio=$fil['pro_precio'];
$imagen=$fil['pro_imagen'];
$descripcion=$fil['pro_decripcion'];
$id=$fil['id_pedido'];
$can=$fil['cantidad'];
$descuento=$fil['descuento'];

?>