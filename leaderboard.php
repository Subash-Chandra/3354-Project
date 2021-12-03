<?php
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
        //result = mysqli_query($con, "SELECT * FROM `users` ORDER BY `highscore` DESC LIMIT 5;")
        echo result;
    ?>
</body>
</html>