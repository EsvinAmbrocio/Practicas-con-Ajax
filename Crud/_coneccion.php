<?php
    class producto{
        private $datos="";
        private $usuarios="";
        private $password="";
        Private $conexion="";

        function __construct($info,$user,$pass ){
            $this->datos=$info;
            $this->usuarios=$user;
            $this->password=$pass;
        }
         public function coneccion(){
          try {
              $this->conexion= new PDO(
                  $this->datos,
                  $this->usuarios,
                  $this->password
                );

                return"todo bien";
            } 
        catch (PDOException$e) {
            echo "No se puede conectar a la base de datos Error:".$e;
            }  
        }
        public function alta($filds,$tabla,$campos){
            // $this->coneccion();
            $sql="";
            foreach($campos as $key => $value){
                $sql="
                    INSERT INTO $tabla(
                        $filds
                    )
                    Value(
                        '".$value['name']."',
                        '".$value['price']."',
                        '".$value['brand']."'
                        )
                ";
            }
            try {
                $conecion=$this->conexion->query($sql);
            } catch (PDOException$e) {
                print_r($e);
            }

        }

    }

?>