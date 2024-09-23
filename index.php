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

    
    <nav class="navbar navbar-expand-lg navbar-light color=#9AE188; ">
        <div class="container-fluid">
            
        <img src="img/logo2.jpeg" alt="..." class="rounded-circle" width="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                </ul>
                <form class="d-flex" method="post" role="search">
                    <a class="navbar-brand btn btn-primary" href="login.php">iniciar sesion</a>
                    </a>
                </form>
            </div>
        </div>
    </nav>
    <h2 class="title">Productos</h2>
    <div class="container">
        <?php        
            include_once 'clistar_productos.php';          
            while($mostrar=mysqli_fetch_array($data)){
                ?>
        <div class="card" style="width: 20rem; margin: 20px;">
            <img src="imagenes/<?php echo $mostrar['pro_imagen']?>.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
            <?php
                    if($mostrar['descuento']>0){
                    $eti=$mostrar['descuento']."% de descuento";
                    $eti2="Antes: s/.".$mostrar['pro_precio'];
                    }else{
                    $eti="";
                    $eti2="";
                    }
                    ?>
                    <?php $antes=2+$mostrar['pro_precio']?>
                    <?php $ahora=$mostrar['pro_precio']-($mostrar['pro_precio']*$mostrar['descuento']/100)?>
                    <h5 class="card-title"><?php echo $mostrar['pro_nombre']?></h5>
                    <p class="card-text " style="color:red;"><?php echo $eti?> </p>
                    <p class="card-text"><?php echo $mostrar['pro_decripcion']?></p>
                    <p class="card-text " style="color:red;"><?php echo $eti2?> </p>
                    <p class="card-text"><?php echo  "Precio: s/.".$ahora?></p>

                    <button class="btn btn-danger">
                        <?php echo " <a  href='vadd_carrito.php?id=".$mostrar['id_producto']."' class='link-light'>AGREGAR</a> ";?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cart3" viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg></button>
                    </a>
                    <input type="hidden" name="'idpro<?php echo $mostrar['id_producto']; ?>"
                        value="<?php echo $mostrar['id_producto']; ?>">
                    <input type="hidden" name="idcli" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">

                </div>
        </div>
        <?php } ?>
        <br>
    </div>
   <center>
    </center> 
</body>
<?php
    include_once "pie.php";
?>
</html>