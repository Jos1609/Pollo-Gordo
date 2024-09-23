<?php
include_once "mclase.php";
$Con=new Conexion();
$Con->Conectar();
$sql="select * from producto order by id_producto desc";
$data=$Con->pruebasq($sql);

?>