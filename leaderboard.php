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
    <title> Leaderboard </title>
    <link rel="stylesheet" href="app.css" />
    
</head>
<body>

    <div class="container">
    <center><h1 style="font-size: 5.4rem; color: #56a5eb;margin-bottom: 5rem;">Leaderboard</h1></center>
    <table>
        <tr>
            <th>Score</th>
            <th>User</th>
        </tr>

    <?php
        require("db.php");
        $query = "SELECT * FROM `users` ORDER BY `highscore` DESC LIMIT 5;";
        $result = mysqli_query($con, $query);
        if ($result == FALSE) die ("could not execute statement $query<br />");

        while($row = mysqli_fetch_row($result)) {
            ?>
            <tr>
                <td> 
                    <?php echo($row[1]); ?>
                </td>
                <td>
                    <?php echo($row[2]); ?>
                </td>
                
            <br>
            <?php           
        }
        
    ?>
    </div>
    
    
    <div class="tiny-container">
        <h5 id="padding"></h5>
        <div>
            <button onclick="location.href='index.php'">Home</button>
        </div>
    </div>
</body>
</html>