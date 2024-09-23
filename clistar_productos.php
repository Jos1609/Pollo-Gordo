<?php
include_once "mclase.php";
$Con=new Conexion();
$Con->Conectar();
$sql="select * from producto where pro_estado='activo' or pro_estado='oferta'  order by id_producto desc";
$data=$Con->pruebasq($sql);

?>