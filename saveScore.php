<?php
error_reporting(-1);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

include('auth.php');
require('db.php');


if (isset($_POST["score"])) {
    $score = $_POST["score"];
}
if (isset($_SESSION["username"])) {
    $currentUser = $_SESSION["username"];
}
$checkQuery = "SELECT `highscore` from `users` WHERE `username`='$currentUser'";
$result = mysqli_query($con, $checkQuery);
$currentHighscore = mysqli_fetch_row($result);

if ($score > $currentHighscore[0]) {
    $updateQuery = "UPDATE `users` SET `highscore` = $score WHERE `username` = '$currentUser'";
    mysqli_query($con, $updateQuery);
}
$con->close();
?>