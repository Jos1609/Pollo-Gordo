<?php
class Conexion{
    private $con;
    public function Conectar(){
        $this->con=mysqli_connect('localhost','root','','empresajos');
    }
    public function pruebasq($sql){
        $r=mysqli_query($this->con,$sql);
        return $r;     
    }

    public function Listar($sql){
        $r=mysqli_query($this->con,$sql);
        $ncampos=mysqli_num_fields($r);//cuenta el numero de campos de la consulta
        while ($re=mysqli_fetch_array($r)){
            for($w=1;$w<=$ncampos;++$w){                
            echo $re[$w-1]," ";
        }echo "<br>";
        }        
    }
    public function Consultar($sql2){
        mysqli_query($this->con,$sql2);
    }
    public function Buscar($sql3){
        $r=mysqli_query($this->con,$sql3);
        $xnombre="";
        if ($re=mysqli_fetch_array($r)){
            $xnombre=$re[2];
        }
        return $xnombre;
    }

}
?>