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
            <div class="choice-container" style='margin-bottom: 40px;'>
                <form id = "gametype">
                <input type="radio" name="choice" value="Humans" checked> <label style="font-size: 2.8rem;font-weight: 500;">Humans</label>
                </form>
            </div>
            <h2 id="question">Game Mode</h2>
            <div class="choice-container" style='margin-bottom: 40px;'>
                <form id = "gamemode">
                <input type="radio" name="choice" value="SuddenDeath" checked> <label style="font-size: 2.8rem;font-weight: 500;">Sudden Death</label>
                </form>    
            </div>
            <script type="text/javascript" src="gameinfo.js"></script>
            <button style='margin-bottom: 40px;' class="btn" onclick="submitAnswer(gametype.choice.value, gamemode.choice.value)">Submit</button>
            <div class="text-center">
            <button class="btn" onclick="location.href='index.php'">Home</button>
            </div>
        </div>
    </div>
</body>
</html>


