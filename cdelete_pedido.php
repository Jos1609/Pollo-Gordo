<?php
include_once "mclase.php";
$conexion=new Conexion();
$conexion->Conectar();
$id=$_POST['id'];
$sql="delete from pedido where id_pedido=".$id."";
$conexion->Consultar($sql);

header("location:vlista_carrito.php");

?>