<?php include "../config/conexionbdd.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Ejemplo</title>
    <script>
        function datos() {
            document.getElementById('nuevo').innerHTML = "<div class='row'><form class='col-12' method='POST' action='crudcar.php' enctype='multipart/form-data'>"
            +"<div class='form-group'><label>Modelo: </label><input type='text' class='form-control' name='txtmodelo'><br>"
            +"<label>Marca: </label><input type='text' class='form-control' name='marca'><br><label>Detalle: </label><textarea class='form-control' name='detalle'></textarea><br>"
            +"<label>Precio: </label><input type='number' class='form-control' name='precio'><br><input type='file' class='form-control' name='archivo' id='archivo'><br><br>"
            +"<input type='submit' class='btn btn-primary' name='guardar' value='Guardar'></div></form></div>";
        }
    </script>
    <?php
    	if (isset($_POST['guardar'])) {
            $modelo = $_POST['txtmodelo'];
            $marca = $_POST['marca'];
            $detalle = $_POST['detalle'];
            $precio = $_POST['precio'];
            $fecha =  date("Y-m-d H:i:s");
            $ruta = $_FILES['archivo']['name'];
            $rutaArchivo = "../img/archivo/".$ruta;
            move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaArchivo);
            $bd->query("insert into productos values ('','$modelo','$marca','$detalle',$precio,'$fecha','1','$rutaArchivo');");  
        }
    ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a href="index.php" class="navbar-brand"><img src="../img/logo.png" alt="car1"></a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Inicio<span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="clientes.php" tabindex="-1" aria-disabled="true">Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="VerCarrito.php" tabindex="-1" aria-disabled="true">Carrito</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Pagos</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <br>
        <br>
        <br>
        <div class="alert alert-success">
            Mensajes.
        </div>        
        <input type="submit" class='btn btn-primary' onclick="datos()" value="Nuevo">
        <br>
        <br>
        <div id="nuevo" class='row'></div>
        <div class="row">
        <table class = "table table-responsibe">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Precio</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Ruta</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            $query = $bd->query("select * from productos;");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
            ?>            
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['modelo'] ?></td>
                    <td><?php echo $row['marca'] ?></td>
                    <td><?php //echo $row['detalle'] ?></td>
                    <td><?php echo $row['precioVenta'] ?></td>
                    <td><?php echo $row['creacion'] ?></td>
                    <td><?php echo $row['estdo'] ?></td>
                    <td><?php echo $row['rutafoto'] ?></td>
                </tr>            
            <?php
                }
            } else {
                echo "<h1>No existe productos.</h1>";
            }
            ?>
            </tbody>
            </table>
        </div>
    </div>
</body>
</html>