<!DOCTYPE html>
<html>
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
        $codUser=$_POST["ID"];
        $valu= intval($codUser);
        $queries= "SELECT INITIATOR, RECEIVER FROM CONECTIONS WHERE INITIATOR = $valu;";
        if($result= $conn->query($queries)){
          if($result->num_rows > 0){
            echo"<div class='table-wrapper-scroll-y'>";
            echo "<table align='center' class='table'>";
            echo "<tr class='danger'>";
            echo "<td>Initiator</td>";
            echo "<td>Receiver</td>";
            while($rowi= $result->fetch_assoc()){
              $initiid=$rowi['INITIATOR'];
              $receiid=$rowi['RECEIVER'];
              $initi=getNameUser($initiid);
              $recei=getNameUser($receiid);
              echo "<tr class='warning'>";
              echo "<td ><p>".$initi."</p></td>";
              echo "<td ><p>".$recei."</p></td>";
              echo "</tr>";
            }
          }
          $result->free();
        }
        $conn->close();
     ?>
  </body>
</html>
