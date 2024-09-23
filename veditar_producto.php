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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="p-3 mb-2 bg-white text-dark">
    <?php
      if(isset($_POST['actualiza'])){
        include('cactualiza_pro.php');
        if($conexion){
        header("location:vlista_proadm.php");
      }else{
          echo "<script> alert('algo salió mal'); location.assign('vlista_proadm.php');
          </script>";
          header("location:vlista_proadm.php");
      }

      
      }else{        
          include('cmodifica_pro.php');
      }
    ?>
    <?php include ('encabezadoadm.php') ?>
    <div class="container-xxl col-5 $indigo-400">
        <center>
            <h2>ACTUALIZAR UN PRODUCTO</h2>
        </center>
        <form method="post" enctype="multipart/form-data">
            <br>
            <div class="row">
                <div class="col">
                    <label for="Agregar una imagen">Nombre del Producto</label>
                    <input type="text" value="<?php echo $nombre?> " name="nombre" class="form-control"
                        placeholder="Nombre del producto" aria-label="Nombre del producto" required>
                </div>
                <div class="col">
                    <label for="Agregar una imagen">Precio del Producto</label>
                    <input type="tel" value="<?php echo $precio?> " name="precio" class="form-control"
                        placeholder="precio" aria-label="precio" required>
                </div>
            </div>

            <div class="row"><br>
                <div class="col">
                    <br>
                    <label for="">Estado del Producto</label>
                    <select name="estado" id="">
                        <option value="<?php echo $estado?> "><?php echo $estado?> </option>
                        <option value="activo">activo</option>
                        <option value="inactivo">inactivo</option>
                        <option value="agotado">agotado</option>
                        <option value="oferta">oferta</option>
                    </select>
                </div>
                <div class="col">
                    <center><label for="">IMAGEN</label></center>
                    <img src="imagenes/<?php echo $imagen?>.jpeg" class="rounded mx-auto d-block" width="100"
                        height="100">

                </div>
                <br><br>
                <div class="row">
                    <label for="">Modificar imagen</label>
                    <input type="file" name="imagen">
                </div>
                <div class="col">
                    <label for="">Descripcion del Producto</label>
                    <input type="text" name="descripcion" class="form-control" placeholder="descripcion"
                        aria-label="precio" value='<?php echo $descripcion?> '>
                </div>
                <div class="row">
                    <br>
                    <label for="">Descuento</label>
                    <input name="descuento" type="number1" step="1" value="<?php echo $descuento?>" min="0" max="90"
                        id="number">
                </div>

            </div>
            <br>
            <div>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="hidden" name="img" value="<?php echo $imagen?>">

                <button name="actualiza" class="btn btn-outline-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-journal-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                        <path
                            d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                        <path
                            d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                    </svg>
                    actualizar producto</button>
            </div><br>
            <a href="inicio.php">
                <button type="button" name="b" value="b" class="btn btn-outline-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                    </svg>
                    INICIO</button>
            </a>
            <a href="vlista_proadm.php">
                <button type="button" name="lis" value="lis" class="btn btn-outline-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                    Listar Productos</button>
            </a>
            <br>
            <br>
        </form>
    </div>
    <?php include ('pie.php') ?>
</body>

</html>
<?php
?>