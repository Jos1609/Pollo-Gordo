
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

</head>

<body class="bg-danger p-2 text-dark bg-opacity-10">
    <?php include ('encabezado.php') ?>
    
    <form method="post">
        <h1>Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenid@ a nuestro sitio.</h1>

        <div class="table-responsive">
            <table class="table">
            <?php if($_POST['buscar']){
    } ?>

                <tr class="bg-success p-2 text-dark bg-opacity-50">
                    <td>producto</td>
                    <td>precio</td>
                    <td>estado</td>
                    <td>imagen</td>
                    <td>cantidad</td>
                    <td>agregar al carrito</td>


                </tr>
                <?php                
                include_once "cbusca_pro.php";
                //listamos los productos        
                while($mostrar=mysqli_fetch_array($data)){
                    if (isset($_POST["eliminar".$mostrar['id_producto']])){
                        include_once "cadd_carrito.php";
                        }
            ?>
                <tr class="bg-warning p-2 text-dark bg-opacity-25">
                    <td><?php echo $mostrar['pro_nombre'] ?></td>
                    <td><?php echo "s/. ".$mostrar['pro_precio'].".00" ?></td>
                    <td><?php echo $mostrar['pro_estado'] ?>
                        <svg xmlns="http://www.w3.org/2000/svg" color="green" width="16" height="16" fill="currentColor"
                            class="bi bi-circle-fill" viewBox="0 0 16 16">
                            <circle cx="8" cy="8" r="8" />
                        </svg>

                    </td>
                    <td><img src="imagenes/<?php echo $mostrar['pro_imagen'] ?>.jpeg" width="80"></td>
                    <td><input type="text" name="cantidad<?php echo $mostrar['id_producto'] ?>"
                            placeholder="Ingrese la cantidad" ></td>
                    <input type="hidden" name="idpro<?php echo $mostrar['id_producto']; ?>"
                        value="<?php echo $mostrar['id_producto']; ?>" readonly>
                    <td>
                        <button name="eliminar<?php echo $mostrar['id_producto'] ?>" value=""
                            class="btn btn-outline-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-cart3" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            agregar al carrito</button>

                    </td>
                    <input type="hidden" name="'idpro<?php echo $mostrar['id_producto']; ?>"
                        value="<?php echo $mostrar['id_producto']; ?>">
                    <input type="hidden" name="idcli" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">
                </tr>
        </div>
        <?php
         
                }
         ?>
        </table>

    </form>
    <?php include ('pie.php') ?>
</body>

</html>