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
			<div style="text-align:center;">
				<input name="submit" type="submit" value="Login" />
			</div>
			</form>
			<p>Not registered yet? </p>
			<a href='registration.php'>Register Here</a>
		</div>
	<?php
	} ?>

	<div class="custom-shape-divider-bottom-1638706257">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
    </svg>
    </div>
</body>
</html>

