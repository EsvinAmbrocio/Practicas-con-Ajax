<?php
// include('./conexion.php');
class task{
    public function buscar($search){
        global $pdo;
        $query = $pdo->prepare("
        SELECT
            *
        FROM
            task
        WHERE
            name 
        LIKE ?
        ");
        $params = array("%$search%");
        $query->execute(
            $params
            );
        return $query->fetchALL();
    }
    public function Agregar($name,$description){
        global $pdo;
        $query = $pdo->prepare("
        INSERT INTO
            task
        SET
            name=:name,
            description=:description
        ");
        $query->execute([
            'name'=>$name,
            'description'=>$description,
            ]);
        // return $query->fetchALL();
    }
    public function MostrarTodo(){
        global $pdo;
        $query = $pdo->prepare("
        SELECT
            *
        FROM
            task
        ");
        $query->execute();
        return $query->fetchALL();
    }
    public function Eliminar($id){
        global $pdo;
        $query = $pdo->prepare("
        DELETE FROM
            task
        WHERE
            id= :id
        ");
        $query->execute([
            'id'=>$id
            ]);
        // return $query->fetchALL();
    }
    public function Editar($id){
        global $pdo;
        $query = $pdo->prepare("
        SELECT
            *
        FROM
            task
        WHERE
            id= :id
        LIMIT
            1
        ");
        $query->execute([
            'id'=>$id
            ]);
        return $query->fetchALL();
    }
    public function Actualizar($id,$name,$description){
        global $pdo;
        $query = $pdo->prepare("
        UPDATE 
          task
        SET
            name=:name,
            description=:description
      WHERE 
        id=:id
      LIMIT     
        1    
        ");
        $query->execute([
            'id'=>$id,
            'name'=>$name,
            'description'=>$description
            ]);
        return $query->fetchALL();
    }
}
?>