<?php 
include "config/conexiondbb.php"; ?>
<!doctype html>
<html lang="es">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/estilos.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>
  
    
    <?php
		session_start();
			
			if (!isset($_SESSION['acceso'])) {
				?>
                <form action='' method='POST'>
      <div class="alert alert-primary" role="alert">
          <center>Login</center> 
      </div>
      <nav class="nav nav-tabs nav-stacked">
          <a class="nav-link active" href="clientes.php">Registro</a>
      </nav>
      <div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user">Nombre:</i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" name="usuario">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key">Clave</i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name="clave">
					</div>
					
					<div class="form-group">
                    <center>
						<input type="submit" value="Login" name="login" class="btn float-right login_btn">
                        </center>
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					¿No tienes una cuenta?<a href="#">Registro</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">¿Ha olvidado su clave?</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!--       
    //mensaje de error 
    <div class="container-fluid">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong></strong> 
        </div>
        
        <script>
          $(".alert").alert();
        </script>
    </div> -->
    <div>
        
    </div>
    </form>
                	<?php	
			}else{
				if ($_SESSION['acceso']=="true") {
					header("Location: inicio.php");
				}	
			}
        if (isset($_POST['login'])){
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $query = $bd->query("Select * from clientes;");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                $usuario2= $row["usuario"];
                $clave2 =  $row["clave"];
                if ($usuario==$usuario2 && $clave==$clave2) {
                    $_SESSION['acceso']="true";
                    header("Location: index.php");
                }else{
                    echo "datos incorrectos";
                }
                }
            } else {
                echo "<h1>No existen productos</h1>";
            }
        }
        ?>
    
  </body>
</html>