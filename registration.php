<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
error_reporting(-1);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        echo('Found username add request.');
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, dateCreated) 
                VALUES ('$username', '".md5($password)."', '$email', '$date')";
        $result = mysqli_query($con,$query);
        echo ($result);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>