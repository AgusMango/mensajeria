<?php
        error_reporting(E_ALL);
        session_start();
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        try{
            $conexion = new PDO("mysql:dbname=mensajeria; host=localhost", "root", "");
            $conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            if($conexion){
                echo "Conexión exitosa a la DB";
            }
        } catch (PDOException $e) {
            echo "Error al conectar con la DB". $e->getMessage();
        }
        return $conexion;
?>