<?php 
date_default_timezone_set("America/Mexico_City");
  try {
     $PDO = new PDO('mysql:host=localhost; dbname=utvt-reportes','root','');
     } catch (PDOException $e) {
         echo "Error!!".$e->getMessage();
    }
    $conexion = new mysqli("localhost", "root", "", "utvt-reportes");

    $date = date("Y-m-d H:i:s");