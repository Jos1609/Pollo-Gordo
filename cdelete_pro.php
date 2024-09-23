<?php
include_once "mclase.php";
echo "<script> alert('eliminar producto'); location.assign('vlista_proadm.php');
</script>";


$CONECTAR1=new Conexion();
$id=$_GET['id'];
$CONECTAR1->Conectar();
$CONECTAR1->Consultar("delete from producto where id_producto='".$id."'");

header("location:vlista_proadm.php");
?>