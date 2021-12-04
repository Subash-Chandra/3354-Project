<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>ITER? - Sudden Death</title>
<link rel="stylesheet" href="app.css" />
<link rel="stylesheet" href="play.css" />

<?php
error_reporting(-1);
// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
include ('auth.php');
require('db.php'); 

//$query = "UPDATE `users` SET `highscore` = 1 WHERE username = '$_SESSION["username"]'";
$result = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$_SESSION["username"]'");
if ($result == FALSE) die ("could not execute statement $query<br />");
?>

</head>
<body>
<div class="grid">
<div id="quiz">
<h1>Is This Even Real? - Sudden Death</h1>
<hr style="margin-bottom: 20px">
<p id="question"></p>
<div class="buttons">
<button id="btn0"><span id="choice0"></span></button>
<button id="btn1"><span id="choice1"></span></button>
<button id="btn2"><span id="choice2"></span></button>
<button id="btn3"><span id="choice3"></span></button>
</div>
<hr style="margin-top: 50px">
<footer>
<p id="progress">Question x</p>
</footer>
</div>
</div>
<script type="text/javascript" src="play.js"></script>
</body>
</html>