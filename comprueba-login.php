<?php
    include("config.php");
    try{
        $base=new PDO("mysql:host=localhost; dbname=rutasdelperu", "root","");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM registro WHERE login=:login AND password=:password";
        $resultado=$base->prepare($sql);
        $login = htmlentities(addslashes($_POST["login"]));
        $password = htmlentities(addslashes($_POST["password"]));
        $resultado->bindValue(":login", $login);
        $resultado->bindValue(":password", $password);
        $resultado->execute();
        $numeroRegistro = $resultado->rowCount();
        if($numeroRegistro!=0){
            header("location: index.php");
        }else{
            header("location: login.php");
        }
    }catch(Exception $e){
        die("Error:" . $e->getMessage());
    }



?>