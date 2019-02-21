<?php
  //Returns the name of the user by his id
  include "connection.php";
  function getNameUser($id){
    include "connection.php";
    $conn = new mysqli($host, $user, $passwd, $database);
    if ($conn->connect_error){
       die("Fallo de conexión con la base de datos: ".$connector->connect_error);
    }
    $order= "SET NAMES 'utf8'";
    $conn->query($order);
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

  function addUser($name){
    include "connection.php";
    $conn = new mysqli($host, $user, $passwd, $database);
    if ($conn->connect_error){
       die("Fallo de conexión con la base de datos: ".$connector->connect_error);
    }
    $order= "SET NAMES 'utf8'";
    $conn->query($order);
    $queries= "INSERT INTO ALGOTEST.USERS(NAME) VALUES ('$name')";
    $res=$conn->query($queries);
    $conn->close();
  }

  function addConnection($initiator,$receiver){
    include "connection.php";
    $conn = new mysqli($host, $user, $passwd, $database);
    if ($conn->connect_error){
       die("Fallo de conexión con la base de datos: ".$connector->connect_error);
    }
    $order= "SET NAMES 'utf8'";
    $conn->query($order);
    $queries= "INSERT INTO ALGOTEST.CONECTIONS(INITIATOR,RECEIVER) VALUES ($initiator, $receiver)";
    $res=$conn->query($queries);
    $conn->close();
  }
 ?>
