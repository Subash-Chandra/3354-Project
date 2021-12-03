<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!-- This page will be used to select the Game Mode and Game Type -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITER? - Game Selection</title>
    <link rel='stylesheet' href="app.css">
    <link rel="stylesheet" href="play.css">
</head>
<body>
    <div class="container">
        <div id="game" class="flex-center flex-column">
            <h1>Is This Even Real?</h1>
            <h2 id="question">Game Type</h2>
            <div class="choice-container">
                <form id = "gametype">
                <input type="radio" name="choice" value="Humans" checked> Humans
                </form>
            </div>
            <h2 id="question">Game Mode</h2>
            <div class="choice-container">
                <form id = "gamemode">
                <input type="radio" name="choice" value="SuddenDeath" checked> Sudden Death
                </form>    
            </div>
            <button onclick="submitAnswer(gametype.choice.value, gamemode.choice.value)">Submit</button>
        </div>
    </div>
</body>
</html>


<script>
var submitAnswer = function(gType, gMode) {
    //put the info into global variables so they can be accessed in another file
    global gameType=gType;
    global gameMode=gMode;

    //change when we have more than 1 game mode implemented
    window.location.href = "http://45.33.17.77/play.html";

};
</script>
