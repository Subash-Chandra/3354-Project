<?php

$serverName ="localhost";
$dBUsername ="dbadmin";
$dBPassword ="crayon36mesh";
$dBName ="loginsystem";

$conn mysqli_connect($serverName, $dBUsername, $dBPassword, $dbName);

if(!conn){
    die("connection failed: ".mysqli_connect_error());
}