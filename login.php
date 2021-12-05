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
	$result = mysqli_query($con,$query) or die("could not execute statement $query<br />");
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
		$numRowQuery = "SELECT * FROM `fake`";
		$imageList = mysqli_query($imageDBCon, $numRowQuery);
		if ($imageList == FALSE) die ("could not execute statement $numRowQuery<br />");
		$i = random_int(0, mysqli_num_rows($imageList));
		$imageFetchQuery = "SELECT `filename` FROM `fake` WHERE `id`=$i";
		$image = mysqli_query($imageDBCon, $imageFetchQuery);
		if ($image == FALSE) die ("could not execute statement $imageFetchQuery<br />");
		$imageLocation = mysqli_fetch_row($image)[0];
		?>

		<center>
			<h1 style="font-size: 5.4rem; color: #56a5eb;margin-bottom: 5rem;">Is This Even Real?</h1>
		</center>
		<div class="form">
			<br>
			<img src=/images/fake/faces/<?php echo $imageLocation ?> width=250 height=250></img>
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

<div class="custom-shape-divider-bottom-1638705498">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
    </svg>
</div>
</body>
</html>

