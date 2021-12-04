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

//UPDATE SCORE
?>

<body>
<div class="grid">
    <div id="quiz">
        <h1>Result</h1>
        <h2 id='score'> Your score: " +  + "</h2>
        <div id="game" class="flex-center flex-column">
            <div>
                <button class="btn" onclick="location.href='index.php'">Home</button>
                <button class="btn" onclick="location.href='leaderboard.php'">Leaderboard</button>
            </div>
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