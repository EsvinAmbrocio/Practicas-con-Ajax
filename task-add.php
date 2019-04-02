<?php
include('./conexion.php');
include('./Funciones.php');
//  var_dump($_POST);
if(isset($_POST['name'])){
    $name=$_POST['name'];
    $description=$_POST['description'];
    $task= new task();
    $add=$task->Agregar($name,$description);
    if($add){
        die('Query Failed');
    }
    echo 'Task added successfully';
}
?>