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
    <?php include_once ("encabezado.php")?>
    <h2 class="title">Productos con descuentos</h2>
    <div class="container">
        <?php        
            include_once 'clis_oferta.php';          
            while($mostrar=mysqli_fetch_array($data)){
                ?>
        <div class="card" style="width: 20rem; margin: 20px;">
            <img src="imagenes/<?php echo $mostrar['pro_imagen']?>.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <?php $ahora=$mostrar['pro_precio']-($mostrar['pro_precio']*$mostrar['descuento']/100)?>
                <h3 class="card-title"><?php echo $mostrar['pro_nombre']?> </h3>
                <p class="card-text " style="color:red;"><?php echo $mostrar['descuento']."% de descuento"?> </p>
                <p class="card-text"><?php echo $mostrar['pro_decripcion']?></p>
                <p class="card-text text-decoration-line-through" style="color:red;"><?php echo "Antes: s/.".$mostrar['pro_precio']?>
                </p>
                <p class="card-text"><?php echo  "Ahora: s/.".$ahora?></p>
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

</body>
<?php  include_once("pie.php")?>

</html>