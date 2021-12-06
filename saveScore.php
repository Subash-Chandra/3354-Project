<?php
include('auth.php');
require('db.php');


if (isset($_POST["score"])) {
    $score = $_POST["score"];
}
else $score = 2;
if (isset($_SESSION["username"])) {
    $currentUser = $_SESSION["username"];
}
$checkQuery = "SELECT `highscore` from `users` WHERE `username`='$currentUser'";
$result = mysqli_query($con, $checkQuery);
echo ($result);
$currentHighscore = mysqli_fetch_row($result);
if ($score > $currentHighscore) {
    echo ("score > current");
    $updateQuery = "UPDATE `users` SET `highscore` = $score WHERE `username` = '$currentUser'";
    mysqli_query($con, $updateQuery);
}
$con->close();
?>