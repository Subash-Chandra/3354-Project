<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);
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
    <?php
        require("db.php");
        $query = "SELECT `username` FROM `users` ORDER BY `highscore` DESC LIMIT 1;";
        $result = mysqli_query($con, $stmt);
        if ($result == FALSE) die ("could not execute statement $query<br />");

        while($row = $result.fetch_row()) {
            echo($row[0])
        }
        
        
    ?>
    <h1>Leaderboard</h1>
    
</body>
</html>