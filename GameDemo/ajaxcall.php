<!-- Ajax Call -->

<?php
$dbhost = "localhost";
$dbuser = "felleson1";
$dbpass = "S218277";
$dbname = "Game1";
$username = $_REQUEST["username"];
$dayuserscore = $_REQUEST["dayuserscore"];
$weekuserscore = $_REQUEST["weekuserscore"];
$monthuserscore = $_REQUEST["monthuserscore"];
$alltimeuserscore = $_REQUEST["alltimeuserscore"];
$userid = $_REQUEST["userid"];
if(!$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

$query1 = "UPDATE DayLeaderboard SET score= '$dayuserscore' where id='$userid'";
$query2 = "UPDATE MonthLeaderboard SET score= '$monthuserscore' where id='$userid'";
$query3 = "UPDATE WeekLeaderboard SET score= '$weekuserscore' where id='$userid'";
$query4 = "UPDATE AllTimeLeaderboard SET score= '$alltimeuserscore' where id='$userid'";

mysqli_query($connection, $query1);
mysqli_query($connection, $query2);
mysqli_query($connection, $query3);
mysqli_query($connection, $query4);
?>
