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
        
        <div class="table-responsive">
            <table class="table">
                <tr class="bg-success p-2 text-dark bg-opacity-50">
                    <td>producto</td>
                    <td>estado de pago</td>
                    <td>imagen</td>
                    <td>precio</td>
                    <td>cantidad</td>
                    <td>total pagado</td>
                    <td>fecha</td>
                    <td>hora</td>
                </tr>
                <?php
                include_once 'clista_historial.php';                   
                //listamos los productos        
                while($mostrar=mysqli_fetch_array($data)){                    
            ?>
                <tr class="bg-warning p-2 text-dark bg-opacity-25">
                    <td><?php echo $mostrar['pro_nombre'] ?></td>
                    <td><?php echo $mostrar['estado'] ?>
                    <svg xmlns="http://www.w3.org/2000/svg" color="green" width="16" height="16" fill="currentColor"
                                class="bi bi-credit-card-2-front-fill" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                            </svg>  
                    </td>
                    <td><img src="imagenes/<?php echo $mostrar['pro_imagen'] ?>.jpeg" class="rounded-circle" width="80"></td>
                    <td><?php echo "s/. ".$mostrar['pro_precio'].".00" ?></td>
                    <td><?php echo $mostrar['cantidad']?></td>
                    <td><?php echo "s/. ".$mostrar['pago']?></td>
                    <td><?php echo $mostrar['fecha']?></td>
                    <td><?php echo $mostrar['hora']?></td>

                    <input type="hidden" name="idpro<?php echo $mostrar['id_producto']; ?>"
                        value="<?php echo $mostrar['id_producto']; ?>" readonly>                    
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
    <p>
    <?php include ('pie.php') ?>
    </p>
</body>
</html>