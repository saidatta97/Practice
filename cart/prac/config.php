<?php
$dbuser="root";
$dbpass="";
$host="localhost";
$db="ecart";
$mysqli =new mysqli($host,$dbuser, $dbpass, $db);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>