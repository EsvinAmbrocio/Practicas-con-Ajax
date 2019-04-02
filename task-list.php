<?php
    include('./conexion.php');
    include('./Funciones.php');
    $task= new task();
    $list=$task->MostrarTodo();
    if(!$list){
        die('Query Failed');
    }
    $json = array();
    foreach($list as $mostrar){
        $json[]= array(
            'name' => $mostrar['name'],
            'description' => $mostrar['description'],
            'id' => $mostrar['id']
        );
    }
    $jsonString=json_encode($json);
        echo $jsonString;
?>