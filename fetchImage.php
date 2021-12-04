<?php

require("imageDB.php");
$fake = $_POST['fake'];
$numRowQuery;
if ($fake) {
    $numRowQuery = "SELECT * FROM `fake`";
}
else { $numRowQuery = "SELECT * FROM `real`"; }

$imageList = mysqli_query($imageDBCon, $numRowQuery);
if ($imageList == FALSE) die ("could not execute statement $numRowQuery<br />");
$i = random_int(0, mysqli_num_rows($imageList));

$imageFetchQuery;
if ($fake) {
    $imageFetchQuery = "SELECT `filename` FROM `fake` WHERE `id`=$i";
}
else { $imageFetchQuery = "SELECT `filename` FROM `real` WHERE `id`=$i"; }

$image = mysqli_query($imageDBCon, $imageFetchQuery);
if ($image == FALSE) die ("could not execute statement $imageFetchQuery<br />");
$imageLocation = mysqli_fetch_row($image)[0];


echo json_encode($imageLocation);
?>