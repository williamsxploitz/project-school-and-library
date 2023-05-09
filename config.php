<?php

$con = mysqli_connect("localhost","root","");

if (!$con) {

	echo "Error connecting to localhost";
}
$db = mysqli_select_db($con, "meridian");

if (!$db) {
	echo "Error selecting database" .mysqli_error($con);
}


?>