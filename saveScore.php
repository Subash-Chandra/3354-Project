<?php
require('db.php');

if (isset($_POST["score"])) {
    $score = $_POST["score"];
    echo ("Found score of " + $score);
}
else $score = 3;

$currentUser = $_SESSION["username"];
echo ($currentUser);
$query = "UPDATE `users` SET `highscore` = $score WHERE `username` = '$currentUser'";
echo ($query);
mysqli_query($con, $query);

//header("Location: index.php");
?>