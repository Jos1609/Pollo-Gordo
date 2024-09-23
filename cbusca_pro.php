<?php
include_once "mclase.php";
$Con=new Conexion();
$Con->Conectar();
$nombre=$_POST['nombre'];
$sql="select * from producto where pro_nombre LIKE '".$nombre."%'  order by pro_nombre desc";
$data=$Con->pruebasq($sql);

?>