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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    </head>
    <body>

    <div class="custom-shape-divider-top-1638705065">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
    </svg>
    </div>

    <div class="container">
      <div id="home" class="flex-center flex-column">
        <h1>Is This Even Real?</h1>
        <a href="/gameselect.php" class="btn">Play </a>
        <a href="/leaderboard.php" class="btn">Leaderboard</a>
        <a href="/options.html" class="btn">Options</a>
        <h6>-</h6>
        <a href="javascript:window.external.AddFavorite('http://45.35.17.77', ''Is This Even real?'')">Add to Bookmarks</a>
        <h6>-</h6>
        <a href="logout.php">Logout</a>
      </div>
    </div>
    </body>
</html>