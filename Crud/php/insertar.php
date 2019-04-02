<?php
    require_once('../_coneccion.php');
  
    $db= new producto('mysql:dbname=tienda;host=localhost;','root','');
    
    $db->coneccion();


    $columnas="nombre,precio,marca";
    $campos=array($_POST);
    // print_r($campos);

    $producto = $db->alta($columnas,'producto', $campos);
    if(empty($producto)){
        echo "se agrego";
    }
    ?>