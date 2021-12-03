<?php
error_reporting(-1);
// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//include auth.php file on all secure pages
include("auth.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="app.css" />
    
</head>
<body>
    <h1>Leaderboard</h1>
    <?php
        require("db.php");
        $query = "SELECT `username` AND `highscore` FROM `users` ORDER BY `highscore` DESC LIMIT 5;";
        $result = mysqli_query($con, $query);
        if ($result == FALSE) die ("could not execute statement $query<br />");

        while($row = mysqli_fetch_row($result)) {
            echo($row[0]);
            echo("    ");
            echo($row[1]);
            ?><br><?php           
        }
        
    ?>

    <h5 id="padding">-</h5>
    <div><button onclick="location.href='index.php'">Home</button></div>
    
</body>
</html>