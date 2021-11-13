<?php

session_start();
$host ="localhost";
$user ="dbadmin";
$pass ="crayon36mesh";
$dBname ="loginsystem";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dbName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}