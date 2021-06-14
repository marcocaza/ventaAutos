<?php

include "Pedidos.php";
include "../config/conexiondbb.php";
$pedidos = new Pedidos;
if (isset($_REQUEST['accion']) && !empty($_REQUEST['accion'])) {
    if ($_REQUEST['accion'] === 'addToCart' && !empty($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        //Realizaria una consulta a la base de datos para 
        //traer los datos del producto con el id
        $query = $bd->query("Select * from productos where id = " . $id);
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id'],
            'marca' => $row['marca'],
            'precioVenta' => $row['precioVenta'],
            'cantidad' => 1
        );
        $insertItem = $pedidos->add($itemData);
        //print_r($_SESSION['cart_contents']);
        $redirecLoc = $insertItem ? 'VerCarrito.php' : '../inicio.php';
        header("Location: " . $redirecLoc);
    } else if ($_REQUEST['accion'] === 'removeItem'  && !empty($_REQUEST['id'])) {
        $pedidos->remove($_REQUEST['id']);
        header("Location: VerCarrito.php");
    } else if ($_REQUEST['accion'] === 'updateItem'  && !empty($_REQUEST['id'])) {
        $itemData = array(
            'rowid'=>$_REQUEST['id'],
            'cantidad'=>$_REQUEST['cantidad']
        );      
        $updateItem =  $pedidos->update($itemData);       
        echo $updateItem?'ok':'err';
        die;
    }
}
