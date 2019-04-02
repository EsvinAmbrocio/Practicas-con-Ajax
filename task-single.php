<?php
    include('./conexion.php');
    include('./Funciones.php');
    // var_dump($_POST);

    if(isset($_POST['id'])){
        $id= $_POST['id'];
        $task= new task();
        $editar=$task->Editar($id);
        // var_dump($delete);

    $json = array();
    foreach($editar as $edita){
        $json[]= array(
            'name' => $edita['name'],
            'description' => $edita['description'],
            'id' => $edita['id']
        );
    }
    $jsonString=json_encode($json);
    echo $jsonString;

        // if($delete){
        //     die('Query Failed');
        // }
        // echo "Eliminado";
    }

?>