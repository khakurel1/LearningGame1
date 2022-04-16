<!-- Connection -->

<?php

$dbhost = "localhost";
$dbuser = "felleson1";
$dbpass = "S218277";
$dbname = "Game1";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
