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

  function removeConnection($initiator,$receiver){
    include "connection.php";
    $conn = new mysqli($host, $user, $passwd, $database);
    if ($conn->connect_error){
       die("Fallo de conexión con la base de datos: ".$connector->connect_error);
    }
    $order= "SET NAMES 'utf8'";
    $conn->query($order);
    $queries= "DELETE FROM ALGOTEST.CONECTIONS WHERE (INITIATOR = $initiator AND RECEIVER = $receiver)";
    $res=$conn->query($queries);
    $conn->close();
  }

  function getOptionsConnection(){
    include "connection.php";
    $conn = new mysqli($host, $user, $passwd, $database);
    if ($conn->connect_error){
       die("Fallo de conexión con la base de datos: ".$connector->connect_error);
    }
    $order= "SET NAMES 'utf8'";
    $conn->query($order);
    $queries= "SELECT * FROM USERS;";
    $usersform="";
    if($result= $conn->query($queries)){
      if($result->num_rows > 0){
        while($rowi= $result->fetch_assoc()){
          $id=$rowi['ID'];
          $name=$rowi['NAME'];
          $usersform=$usersform."<option value='$id'>$name</option>\n";
        }
      }
      $result->free();
    }
    return $usersform;
  }

  function getUsersForm(){
    include "connection.php";
    $conn = new mysqli($host, $user, $passwd, $database);
    if ($conn->connect_error){
       die("Fallo de conexión con la base de datos: ".$connector->connect_error);
    }
    $order= "SET NAMES 'utf8'";
    $conn->query($order);
    $queries= "SELECT * FROM USERS;";
    $formRes="";
    if($result= $conn->query($queries)){
      if($result->num_rows > 0){
        $formRes="<div class='table-wrapper-scroll-y'>".
        "<table align='center' class='table'>".
        "<tr class='danger'>".
        "<td>Id</td>".
        "<td>Users</td><td></td>";
        while($rowi= $result->fetch_assoc()){
          $id=$rowi['ID'];
          $name=$rowi['NAME'];
          $formRes=$formRes."<tr class='warning'>".
          "<td><p>".$id."</p></td>".
          "<td><p>".$name."</p></td>".
          "<td><form method='POST' action='connections.php' target='cuerpo'>".
          "<input type='hidden' name='ID' value=$id>".
          "<input type='submit' class='btn btn-info' value='User' name='user'></form>".
          "</td>".
          "</tr>";
        }
      }
      $result->free();
    }
    $formRes=$formRes."</table>".
    "</div>";
    $conn->close();
    return $formRes;
  }

 ?>
