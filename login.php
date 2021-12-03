<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
error_reporting(-1);
// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if ($rows==1)
		{
	    	$_SESSION['username'] = $username;
			$date = date("Y-m-d H:i:s");
			mysqli_query($con,"UPDATE `users` SET lastLogin = '$date' WHERE username='$username'");
        	// Redirect user to index.php
	    	header("Location: index.php");
        }
		else
		{
			echo "<div class='form'>
				<h3>Username/password is incorrect.</h3>
				<br/>Click here to <a href='login.php'>Login</a></div>";
		}
    }
	else
	{
		require("imageDB.php");
		$query = "SELECT * FROM `fake`";
		$imageList = mysqli_query($imageDBCon, $query);
		if ($imageList == FALSE) die ("could not execute statement $query<br />");
		$i = random_int(0, mysqli_num_rows($imageList));
		echo ($i);
		//echo (mysqli_fetch_row($imageList)[1]);
		?>
		<div class="form">
			<h1>Is This Even Real?</h1>
			<img src=/images/fake/faces/></img>
			<h2> Log in</h2>
			<form action="" method="post" name="login">
			<input type="text" name="username" placeholder="Username" required />
			<input type="password" name="password" placeholder="Password" required />
			<input name="submit" type="submit" value="Login" />
			</form>
			<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
		</div>
	<?php
	} ?>
</body>
</html>

