<?php
    //Datos de conexión

    $hostdb = 'localhost';
    $userdb = 'root';
    $pwd = '';
    $bdd = 'sgventasautos';

    //Crear la conexión
    $bd = new mysqli($hostdb,$userdb,$pwd,$bdd);
    if($bd->connect_error){
        die("No hay conexión");
    }
?>