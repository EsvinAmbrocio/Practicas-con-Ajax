<?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=tasks-app;charset=utf8','root','');
        //charser=utf8 esto funciona para mostrar todos los caracteres
    }
    catch(PDOException$e){
        echo "No se puede conectar a la base de datos Error:".$e;
    }
?>