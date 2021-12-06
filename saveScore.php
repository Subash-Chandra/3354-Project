<?php
include('auth.php');
require('db.php');


if (isset($_POST["score"])) {
    $score = $_POST["score"];
}
if (isset($_SESSION["username"])) {
    $currentUser = $_SESSION["username"];
}

$query = "UPDATE `users` SET `highscore` = $score WHERE `username` = '$currentUser'";
mysqli_query($con, $query);

$con->close();
?>