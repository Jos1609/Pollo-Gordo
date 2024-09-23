<?php
include_once "mclase.php";
$Con=new Conexion();
$Con->Conectar();

$idcli=htmlspecialchars($_SESSION["username"]);;
$idpro=$_POST['id'];
$can=$_POST['cantidad'];
$pago=$_POST['pago']*$can;


$sql="insert into pedido values('','".$idcli."','".$idpro."','".$can."',now(),'carrito',now(),'','".$pago."');";
$Con->Consultar($sql);
?>