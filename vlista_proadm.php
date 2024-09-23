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
    <?php include ('encabezadoadm.php') ?>
    <form method="post">
        <center><h2>Lista de productos</h2></center>
        <div class="table-responsive">
            <table class="table">


                <tr class="bg-success p-2 text-dark bg-opacity-50">
                    <td>codigo</td>
                    <td>nombre</td>
                    <td>precio</td>
                    <td>estado</td>
                    <td>imagen</td>
                    <td><center>EDITAR</center></td>
                    <td><center>ELIMINAR</center></td>
                </tr>
                <?php
                include_once 'clista_proadmin.php';  
                
                //listamos los productos     
                $xx=0;   
                while($mostrar=mysqli_fetch_array($data)){
                    
                        
            ?>
                <tr class="bg-warning p-2 text-dark bg-opacity-25">
                    <td><?php echo $mostrar['id_producto'] ?></td>
                    <td><?php echo $mostrar['pro_nombre'] ?></td>
                    <td><?php echo $mostrar['pro_precio'] ?></td>
                    <td><?php echo $mostrar['pro_estado'] ?></td>
                    <td><img src="imagenes/<?php echo $mostrar['pro_imagen'] ?>.jpeg" class="rounded-circle" width="80"></td>
                    <td>

                        <button class="btn btn-success " ><?php echo " <a class='link-light' href='veditar_producto.php?id=".$mostrar['id_producto']."'>EDITAR</a> ";?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </button>
                        </td>                                                   
                    <td>
                        <button class="btn btn-danger">
                            <?php echo " <a  href='cdelete_pro.php?id=".$mostrar['id_producto']."' class='link-light'>ELIMINAR</a> ";?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-backspace" viewBox="0 0 16 16">
                                <path
                                    d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
                                <path
                                    d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z" />
                            </svg></button>
                    </td>
                    <input type="hidden" name="'idpro<?php echo $mostrar['id_producto']; ?>"
                        value="<?php $mostrar['id_producto']; ?>">
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