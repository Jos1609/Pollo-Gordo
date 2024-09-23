<?php
    include_once "mclase.php";
    $conexion=new Conexion();
    $conexion->Conectar();

    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];
    $estado=$_POST['estado'];
    $imagen=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];
    $descuento=$_POST['descuento'];
    if(empty($_FILES['imagen']['tmp_name'])){
        $imagen=$_POST['img'];
    }
    $archivo=$_FILES['imagen']['tmp_name'];
    $ruta="imagenes";
    $ruta=$ruta."/".$nombre.".jpeg";
    move_uploaded_file($archivo,$ruta);
    
    $sql="update producto set pro_nombre='".$nombre."',pro_precio=".$precio.",pro_estado='".$estado."',pro_imagen='".$imagen."',pro_decripcion='".$descripcion."',descuento='".$descuento."'
     where id_producto=".$id."
    ";
    
    $conexion->Consultar($sql);
?>