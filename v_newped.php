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
<?php include ('encabezadoadm.php') ?>
<body class="bg-danger p-2 text-dark bg-opacity-10">    
    <form method="post">
        
        <center><h2>NUEVOS PEDIDOS</h2></center>
        <div class="table-responsive">
            <table class="table">
                <tr class="bg-light p-2 text-dark bg-opacity-50">
                    <td>producto</td>
                    <td>Cliente</td>
                    <td>tipo de pago</td>
                    <td>cantidad</td>
                    <td>total pagado</td>
                    <td>fecha</td>
                    <td>hora</td>                    
                    <td>Confirmar</td>
                </tr>
                <?php
                include_once 'cnew_pedidos.php';                   
                //listamos los productos        
                while($mostrar=mysqli_fetch_array($data)){                
            ?>
                <tr class="bg-light p-2 text-dark bg-opacity-50">
                    <td><?php echo $mostrar['pro_nombre'] ?></td>
                    <td><?php echo $mostrar['cli_nom']." ".$mostrar['cli_ape'] ?></td>
                    <td><?php echo $mostrar['tipo_pago']?></td>
                    <td><?php echo $mostrar['cantidad']?></td>
                    <td><?php echo "s/. ".$mostrar['pago']?></td>                    
                    <td><?php echo $mostrar['fecha']?></td>
                    <td><?php echo $mostrar['hora']?></td>
                    <td>
                        <button
                            class="btn btn-success "><?php echo " <a class='link-light' href='cverifica_pago.php?id=".$mostrar['id_pedido']."'>confirmar</a> ";?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-check2-circle" viewBox="0 0 16 16" >
                                <path
                                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                <path
                                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                            </svg>
                        </button>
                    </td>

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