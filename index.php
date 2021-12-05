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

<?php
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
<img src=/images/fake/faces/<?php echo $imageLocation ?> width=250 height=250 style="margin-bottom: 40px"></img>


        <a href="/gameselect.php" class="btn">Play </a>
        <a href="/leaderboard.php" class="btn">Leaderboard</a>
        <a href="/options.html" class="btn">Options</a>
        <h6>-</h6>
        <a href="javascript:window.external.AddFavorite('http://45.35.17.77', ''Is This Even real?'')">Add to Bookmarks</a>
        <h6>-</h6>
        <a href="logout.php">Logout</a>
      </div>
    </div>

    <div class="custom-shape-divider-bottom-1638706257">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
    </svg>
    </div>
    </body>
</html>