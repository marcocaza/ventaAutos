<?php  
	session_start();
	if (isset($_POST['salir'])){
		session_destroy();
		header("Location: index.php");
	}

	if (isset($_SESSION['acceso'])) {
		if ($_SESSION['acceso']=="true") {
            ?>	
        
<?php 
include "config/conexiondbb.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autos Ecuador</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a href="inicio.php" class="navbar-brand"><img src="img/logo1.png" alt="car1" id="logo1"><img src="img/logo2.png" alt="car2" id="logo2"></a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="inicio.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Carrito</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Pagos</a>
                </li>
                <li class="nav-item">
                <form action='' method='POST'>
					<input type='submit' name='salir' value='salir'>
				</form>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>
     <br>
     <br>
     <br>
    <div class="container">
        <div class="alert alert-success">
            Mensajes.
        </div>
        
       
    </div>
    <br>
    <br>
    <br>
    <div class="row">
        <?php
        $query = $bd->query("Select * from productos;");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
        ?>
                <div class="col-3">
                    <div class="card">
                        <img class="card-img-top" src="<?php echo $row["ruta_foto_pro"]; ?>" alt="car1">
                        <div class="card-body">
                            <h3 class="card-title"><strong>Modelo</strong><br><?php echo $row["modelo"]; ?></h5>
                            <h4 class="card-title"><strong>Marca</strong><br><?php echo $row["marca"]; ?></h6>
                            <p class="card-text"><strong>Detalle</strong><br><?php echo $row["detalle"]; ?></p>
                            <h4 class="card-title"><strong>Precio</strong><br><?php echo $row["precioVenta"]; ?></h6>
                            <div class="col-1">
                                <a class="btn btn-success" href="php/Carrito.php?accion=addToCart&id=<?php echo $row['id']; ?>">Agregar al carrito.</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<h1>No existen productos</h1>";
        }
        ?>
    </div>
</body>
</html>
<?php
		}
	}else{
		header("Location: index.php");
	}
?>