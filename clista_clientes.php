<?php
    include_once "mclase.php";
    $Con=new Conexion();
    $Con->Conectar();
    $sql="select * from cliente";
    $data=$Con->pruebasq($sql);   
    
?>