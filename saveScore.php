<?php
require('db.php');

$score = 3; //$_POST['score'];
$currentUser = $_SESSION["username"];
$query = "UPDATE `users` SET `highscore` = $score WHERE `username` = '$currentUser'";

mysqli_query($con, $query);

?>