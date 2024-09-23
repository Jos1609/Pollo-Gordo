 <?php
include_once "mclase.php";
$Con=new Conexion();
$Con->Conectar();
$nom=$_POST['nombre'];

$ape=$_POST['apellido'];
$usu=$_POST['username'];
$sql="insert into cliente values('".$usu."','".$nom."','".$ape."');";
$Con->Consultar($sql);
?>