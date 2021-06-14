 <?php
    session_start();
    //print_r($_SESSION['cart_contents']);
    ?>

 <!DOCTYPE html>
 <html lang="es">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="../css/estilos.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     

     <script>
         function actualizarCantidad(e, id) {

             let xhttp = new XMLHttpRequest();
             let cantidad = e.value;
             xhttp.onload = function() {
                 if (this.response == 'ok') {
                     window.location = "VerCarrito.php";
                 } else {
                    //document.getElementById("mensajes").innerHTML = this.responseText;
                    document.getElementById("mensajes").innerHTML = "Error al actualizar";
                 }
             }
             xhttp.open("GET", "Carrito.php?accion=updateItem&id=" + id + "&cantidad=" + cantidad);
             xhttp.send();
         }
     </script>
 </head>

 <body>
     <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
         
         <a href="inicio.php" class="navbar-brand"><img src="../img/logo1.png" alt="car1" id="logo1"></a>
         <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div id="my-nav" class="collapse navbar-collapse">
             <ul class="navbar-nav mr-auto">
                 <li class="nav-item">
                     <a class="nav-link" href="../inicio.php">Inicio<span class="sr-only">(current)</span></a>
                 </li>
                 <li class="nav-item active">
                     <a class="nav-link disabled" href="php/VerCarrito.php" tabindex="-1" aria-disabled="true">Ver Carrito</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Pagos</a>
                 </li>
             </ul>
         </div>
     </nav>
     <br>
     <br>
     <br>
     <br>
     <div class="container">
         <div class="alert alert-success" id="mensajes">
             Mensajes.
         </div>
     </div>
     <br>
     <br>
     <br>

     <div class="row">
         <div class="col-10">
             <h1>Carrito de compras</h1>
             <table class="table">
                 <thead>
                     <tr>
                         <th>MARCA</th>
                         <th>PRECIO</th>
                         <th>CANTIDAD</th>
                         <th>SUBTOTAL</th>
                         <th></th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        if (isset($_SESSION['cart_contents']) && $_SESSION['cart_contents']['total_items'] > 0) {
                            foreach ($_SESSION['cart_contents'] as $item) {
                                if (isset($item['id']) && !empty($item['id'])) {
                        ?>
                                 <tr>
                                     <td><?php echo $item['marca']; ?></td>
                                     <td><?php echo $item['precioVenta']; ?></td>
                                     <td><input type='number' onchange='actualizarCantidad(this,<?php echo $item["id"]; ?>);' value="<?php echo $item['cantidad']; ?>" /> </td>
                                     <td><?php echo $item['subtotal']; ?></td>
                                     <td>
                                         <a href="Carrito.php?accion=removeItem&id=<?php echo $item["id"]; ?>" class="btn btn-danger">Eliminar</a>
                                     </td>
                                 </tr>
                         <?php
                                }
                            }
                        } else { ?>
                         <tr>
                             <td colspan="5">
                                 <h1>No hay productos seleccionados.</h1>
                             </td>
                         <?php
                        }
                            ?>
                 </tbody>
                 <tfoot>
                     <tr>
                         <th>MARCA</th>
                         <th>PRECIO</th>
                         <th>CANTIDAD</th>
                         <th>SUBTOTAL</th>
                         <th></th>
                     </tr>
                 </tfoot>
             </table>
         </div>
     </div>

 </body>

 </html>