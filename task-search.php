<?php
    include('./conexion.php');
    include('./Funciones.php');
    $search=$_POST['search'];
    if(!empty($search)){
        $task= new task();
        $search=$task->buscar($search);
        // if(!$search){
        //     die('Query Error' . $search->errorInfo());
        // }
        $json=array();
            foreach($search as $buscar){
                $json[]= array(
                    'name' => $buscar['name'],
                    'description' => $buscar['description'],
                    'id' => $buscar['id']
                );
            }

        $jsonString=json_encode($json);
        echo $jsonString;
        // var_dump($search);
    }

?>