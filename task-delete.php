<?php
    include('./conexion.php');
    include('./Funciones.php');
    // var_dump($_POST);

    if(isset($_POST['id'])){
        $id= $_POST['id'];
        $task= new task();
        $delete=$task->Eliminar($id);
        // var_dump($delete);
        if($delete){
            die('Query Failed');
        }
        echo "Eliminado";
    }

?>