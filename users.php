<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>AlgoTest</title>
  </head>
  <body>
    <?php
        include "functions.php";
        include_once "connection.php";
        $conn = new mysqli($host,$user,$passwd,$database);
        if($conn->connect_error){
          die("Fallo de conexión con la base de datos: ".$conn->connect_error);
        }
        $instruct= "SET NAMES 'utf8'";
        $conn->query($instruct);
        $queries= "SELECT * FROM USERS;";
        if($result= $conn->query($queries)){
          if($result->num_rows > 0){
            echo"<div class='table-wrapper-scroll-y'>";
            echo "<table align='center' class='table'>";
            echo "<tr class='danger'>";
            echo "<td>Id</td>";
            echo "<td>Users</td><td></td>";
            while($rowi= $result->fetch_assoc()){
              $id=$rowi['ID'];
              $name=$rowi['NAME'];
              echo "<tr class='warning'>";
              echo "<td ><p>".$id."</p></td>";
              echo "<td ><p>".$name."</p></td>";
              $formArtistas="<form method='POST' action='connections.php' target='cuerpo'>".
                     "<input type='hidden' name='ID' value=$id>".
                     "<input type='submit' class='btn btn-warning'  value='User' name='user'></form>";
              echo "<td >$formArtistas</td>";
              echo "</tr>";
            }
          }
          $result->free();
        }
        $conn->close();
     ?>
  </body>
</html>
