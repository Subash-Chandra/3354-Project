<?php

$imageDBCon = mysqli_connect("localhost","dbadmin","crayon36mesh","images");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL Image Database: " . mysqli_connect_error();
  }
?>