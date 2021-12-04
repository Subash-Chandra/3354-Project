<?php
$con = mysqli_connect("localhost","dbadmin","crayon36mesh","register");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>