<?php
include_once "mclase.php";
$conexion=new Conexion();
$conexion->Conectar();
$id=$_GET['id'];
$sql="update pedido set estado='pagado' where id_pedido='".$id."' ";
$conexion->pruebasq($sql);
if($conexion){
    header('location:v_newped.php');
}

?>