<?php
// Initialize the session
session_start(); 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;    
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
      if(isset($_POST['confirmar'])){
        include('cadd_carrito.php');
        if($Con){
        header("location:vlista_oferta.php");
      }
      
      }else{        
          include('cadd.php');
      }
    ?>
    <div class="con">
        <form method="post">
            <div class="card border-danger" style="width: 20rem; margin: 20px;">
                <img src="imagenes/<?php echo $imagen?>.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $nombre?></h4>
                    <div class="card-body">
                        <?php $pago=($precio-($precio*$descuento/100))?>
                        <p class="card-text">Descripcion</p>
                        <p class="card-text"><?php echo $descripcion?></p>
                        <p class="card-text">Precio: s/<?php echo $pago?></p>
                        <label for="">Cantidad: </label>
                        <input name="cantidad" type="number" placeholder="1" step="1" value="1" min="1" id="number">
                        <br><br><button name="cancelar"  class="btn btn-outline-secondary">CANCELAR</button>
                        <button name="confirmar"  class="btn btn-outline-warning">CONFIRMAR</button>
                    <!-- sacados los datos que nos faltan -->
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="hidden" name="pago" value="<?php echo $pago?>">
                    
                    </div>
                </div>
               
        </form>
    </div>
</body>

</html>
<?php
      if(isset($_POST['cancelar'])){
        header("location:vlista_productos.php");     
      }
    ?>