<?php
include('auth.php');
require('db.php');

//echo ("Page start\n");
if (isset($_POST["score"])) {
    $score = $_POST["score"];
    echo ("Found score of " + $score);
}
//else $score = 3;
//echo("Score check done\n");
if (isset($_SESSION["username"])) {
    $currentUser = $_SESSION["username"];
}
echo("User check done\n");

$query = "UPDATE `users` SET `highscore` = $score WHERE `username` = '$currentUser'";
mysqli_query($con, $query);

?>