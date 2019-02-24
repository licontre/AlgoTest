<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AlgoTest</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
  	<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" />
  	<script src="bootstrap/js/bootstrap.min.js"></script>
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
        if(isset($_POST["RECEIVER"])){
          $codUser=$_POST["ID"];
          $codRece=$_POST["RECEIVER"];
          removeConnection($codUser,$codRece);
        }
        $codUser=$_POST["ID"];
        $valu= intval($codUser);

        $queries= "SELECT c.INITIATOR, c.RECEIVER, us.NAME FROM CONECTIONS c INNER JOIN USERS us ON us.ID = c.RECEIVER  WHERE c.INITIATOR = $valu;";
        if($result= $conn->query($queries)){
          if($result->num_rows > 0){
            echo"<div class='table-wrapper-scroll-y'>";
            echo "<table align='center' class='table'>";
            echo "<tr class='danger'>";
            echo "<td>Initiator</td>";
            echo "<td>Receiver</td>";
            echo "<td>Remove</td>";
            $initi=getNameUser($valu);
            while($rowi= $result->fetch_assoc()){
              $initiid=$rowi['INITIATOR'];
              $receiid=$rowi['RECEIVER'];
              $recei=$rowi['NAME'];
              $formButton="<form method='POST' action='connections.php' target='cuerpo'>".
              "<input type='hidden' name='ID' value=$valu />".
              "<input type='hidden' name='RECEIVER' value=$receiid />".
              "<input type='submit' name='DELETE' value='delete'  class='btn btn-primary'/>".
              "</form>";
              echo "<tr class='warning'>";
              echo "<td><p>".$initi."</p></td>";
              echo "<td><p>".$recei."</p></td>";
              echo "<td>$formButton</td>";
              echo "</tr>";
            }
          }
          $result->free();
        }
        $conn->close();
     ?>
  </body>
</html>
