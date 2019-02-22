<!DOCTYPE html>
<html lang="en" dir="ltr">
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
        if(isset($_POST["SUBMITUSER"])){
          $nam=$_POST["NAME"];
          addUser($nam);
        }
        if(isset($_POST["SUBMITCONNECTION"])){
          $initiator= $_POST["INITIATOR"];
          $receiver= $_POST["RECEIVER"];
          addConnection($initiator,$receiver);
        }
        $conn->query($instruct);
        $listUsersForm=getUsersForm();

        echo "$listUsersForm";

        $conn->close();
     ?>
  </body>
</html>
