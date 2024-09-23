<?php
include_once "mclase.php";
$conexion=new Conexion();
$conexion->Conectar();
$id=$_GET['id'];
$sql="select * from producto where id_producto='".$id."' ";
$xx=$conexion->pruebasq($sql);
$fil=mysqli_fetch_assoc($xx);
$nombre=$fil['pro_nombre'];
$precio=$fil['pro_precio'];
$estado=$fil['pro_estado'];
$imagen=$fil['pro_imagen'];
$descripcion=$fil['pro_decripcion'];
$descuento=$fil['descuento'];

?>