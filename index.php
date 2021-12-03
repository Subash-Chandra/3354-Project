<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Is This Even Real?</title>
        <link rel="stylesheet" href="app.css" />
    </head>
    <body>
    <div class="container">
      <div id="home" class="flex-center flex-column">
        <h1>Is This Even Real?</h1>
        <a href="/gameselect.php" class="btn">Play </a>
        <a href="/leaderboard.html" class="btn">Leaderboard</a>
        <a href="/options.html" class="btn">Options</a>
        <p><a href="dashboard.php">Dashboard</a></p>
        <a href="logout.php">Logout</a>
      </div>
    </div>
    </body>
</html>