<?php
  //Returns the name of the user by his id
  function getNameUser($id){
    include "connection.php";
    $conn = new mysqli($host, $user, $passwd, $database);
    if ($conn->connect_error){
       die("Fallo de conexión con la base de datos: ".$connector->connect_error);
    }
    $orden= "SET NAMES 'utf8'";
    $conn->query($orden);
    $queries= "SELECT NAME FROM USERS WHERE ID = $id";
    $name="";
    if($rowi= $conn->query($queries)){
      while($resu= $rowi->fetch_assoc()){
        $name= $resu['NAME'];
      }
    }
    $rowi->free();
    $conn->close();
    return  $name;
  }

 ?>
