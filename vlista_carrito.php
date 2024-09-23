<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
    
}
?>

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
        <h1>Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenid@ a tu carrito de compras.</h1>

        <div class="table-responsive">
            <table class="table">
                <tr class="bg-success p-2 text-dark bg-opacity-50">
                    <td>producto</td>
                    <td></td>
                    <td>precio</td>
                    <td>cantidad</td>
                    <td>descuento</td>
                    <td>subtotal</td>
                    <td>pagar</td>
                    <td>eliminar</td>
                </tr>
                <?php
                include_once 'clista_carrito.php';  
                $total=0;
                //listamos los productos        
                while($mostrar=mysqli_fetch_array($data)){                    
                   
            ?>
                <tr class="bg-warning p-2 text-dark bg-opacity-25">
                    <?php 
                    $subt=$mostrar['pago']
                    ?>
                    <?php 
                    $descuento=$mostrar['cantidad']*($mostrar['pro_precio']*$mostrar['descuento']/100);
                    ?>
                    <td><?php echo $mostrar['pro_nombre'] ?></td>                    
                    <td><img src="imagenes/<?php echo $mostrar['pro_imagen'] ?>.jpeg" class="rounded-circle" width="80"></td>
                    <td><?php echo "s/. ".$mostrar['pro_precio'].".00" ?></td>
                    <td><?php echo $mostrar['cantidad']?></td>
                    <td><?php echo "s/. ".$descuento?></td>
                    <td><?php echo "s/. ".$subt?></td>
                    <?php $total=$total+$subt?>
                    <input type="hidden" name="idpro<?php echo $mostrar['id_producto']; ?>"
                        value="<?php echo $mostrar['id_producto']; ?>" readonly>
                    
                    <td>
                    <button class="btn btn-outline-success " ><?php echo " <a class='link-light' href='vpagar_pedido.php?id=".$mostrar['id_pedido']."'>PAGAR</a> ";?>
                    <svg xmlns="http://www.w3.org/2000/svg" color="green" width="16" height="16"
                                fill="currentColor" class="bi bi-credit-card-2-front-fill" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                            </svg>
                        </button>
                        

                    </td>
                    <td>
                    <button class="btn btn-outline-danger">
                            <?php echo " <a  href='vdelete_pedido.php?id=".$mostrar['id_pedido']."' class='link-light'>ELIMINAR</a> ";?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-backspace" viewBox="0 0 16 16">
                                <path
                                    d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
                                <path
                                    d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z" />
                            </svg></button>

                    </td>
                    <input type="hidden" name="'id_pedido"
                        value="<?php echo $mostrar['id_pedido']; ?>">
                    <input type="hidden" name="idcli" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">
                </tr>
        </div>
        <?php
         
                }
         ?>
        </table>
        <div class="table-responsive">
            <table class="table">
                <tr class="">
                    
                    <td>
                        <h2>Total a pagar: <input type="text" value="<?php echo $total ?> soles" disabled> </h2>
                    </td>
                    


            </table>
        </div>
    </form>
    <p>
    <?php include ('pie.php') ?>
    </p>
</body>

</html>