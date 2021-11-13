<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Welcome Home</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
    <div class="container">
      <div id="home" class="flex-center flex-column">
        <h1>Quick Quiz</h1>
        <a href="/play.html" class="btn">Play </a>
        <a href="/leaderboard.html" class="btn">Leaderboard</a>
        <a href="/options.html" class="btn">Options</a>
        <p><a href="dashboard.php">Dashboard</a></p>
        <a href="logout.php">Logout</a>
      </div>
    </div>
    </body>
</html>