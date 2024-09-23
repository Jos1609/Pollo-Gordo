<?php
include_once "mclase.php";
$Con=new Conexion();
$Con->Conectar();
$nom=$_POST['nombre'];
$precio=$_POST['precio'];
$estado=$_POST['estado'];
$descripcion=$_POST['descripcion'];

$imagen=$_POST['nombre'];
$archivo=$_FILES['imagen']['tmp_name'];

$ruta="imagenes";
$ruta=$ruta."/".$nom.".jpeg";

move_uploaded_file($archivo,$ruta);

$sql="insert into producto values(null,'".$nom."','".$precio."','".$estado."','".$imagen."','".$descripcion."',0);";
$data=$Con->pruebasq($sql);
if($data){
    header("location:vlista_proadm.php");
}else{
    header("location:vagregar_productos.php");
}
?>