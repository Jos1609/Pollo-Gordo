<?php
include_once "mclase.php";
$conexion=new Conexion();
$conexion->Conectar();
$id=$_POST['id'];
$tipo=$_POST['tipo'];
$pago=$_POST['pago'];
$sql="update pedido set estado='procesando',tipo_pago='".$tipo."',pago='".$pago."' where id_pedido=".$id."";
$conexion->Consultar($sql);

header("location:vlista_carrito.php");

?>