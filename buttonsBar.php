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
      echo "<br/><h1 align='center'>AlgoTest</h1><br/><br/>";
      include "functions.php";
      include_once "connection.php";
      $usersform= getOptionsConnection();
      echo "<table align='center'><tr>";
      echo "<td>";
      echo "<div>";
      echo "<form method='POST' action='users.php' target='content'>";
          echo "<div style='float:left;'><input name='NAME' type='text' value='Name' class='form-control'/></div>";
          echo "<div style='float:left;'><input name='SUBMITUSER' type='submit' value='Add' onmouseout='javascript:window.location.reload();' class='btn btn-primary'/></div>";
      echo "</form>";
      echo "</div></td>";
      echo "<td><div>";
            echo "<form method='POST' action='users.php' target='content'>";
                  echo "<div style='float:left'><select name='INITIATOR' id='initlist' class='form-control'>";
                    echo "<option selected value=0>Initiator</option>";
                    echo "$usersform";
                echo "</select></div>";
                echo "<div style='float:left;'><select name='RECEIVER' id='receivlist' class='form-control'>";
                  echo "<option selected value=0>Receiver</option>";
                  echo "$usersform";
                echo "</select></div>";
                echo "<div style='float:left;'><input name='SUBMITCONNECTION' type='submit' value='Add' class='btn btn-primary'/>";
            echo "</form>";
      echo "</div></td></tr></table>";
   ?>
  </body>
</html>
