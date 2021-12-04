<?php
include('auth.php');
require('db.php');
echo ("Page start\n");
if (isset($_POST["score"])) {
    $score = $_POST["score"];
    echo ("Found score of " + $score);
}
else $score = 3;
echo("Score check done\n");
if (isset($_SESSION["username"])) {
    echo ("Session username is set to " + $_SESSION["username"]);
}
echo("User check done\n");
$currentUser = $_SESSION["username"];
$query = "UPDATE `users` SET `highscore` = $score WHERE `username` = '$currentUser'";
//echo ($query);
mysqli_query($con, $query);

//header("Location: index.php");
?>