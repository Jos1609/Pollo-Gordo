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
<body>
<div class="container w-75 bg-white mt-5 rounded shadow">
            <div class="row p-2">
                <div class="col-3">
                    <form method="post" enctype="multipart/form-data"></form>
                </div>

                <table class="table">
                        <thead>
                            <tr>
                                <th>producto</th>
                                <th>precio</th>
                                <th>cantidad</th>
                                <th>hora</th>
                                <th>pago</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once 'cresume_dia.php';
                            
                            while($mostrar=mysqli_fetch_array($data)){
                                $producto=$mostrar['pro_nombre'];
                                $precio=$mostrar['pro_precio'];
                                $cantidad=$mostrar['cantidad'];
                                $hora=$mostrar['hora'];
                                $pago=$mostrar['pago'];
                            ?>
                            <tr>
                                
                                <td><?=$producto?></td>
                                <td><?=$precio?></td>
                                <td><?=$cantidad?></td>
                                <td><?=$hora?></td>
                                <td><?=$pago?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>
</html>