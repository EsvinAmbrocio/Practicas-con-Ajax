<?php
    include('./conexion.php');
    include('./Funciones.php');
    if(isset($_POST['id'])){
        $id= $_POST['id'];
        $name=$_POST['name'];
        $description=$_POST['description'];
        $task= new task();
        $actualizar=$task->Actualizar($id,$name,$description);
    
    }

    // if(isset($_POST['id'])){
?>