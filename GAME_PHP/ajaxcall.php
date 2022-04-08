<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_sample_db";
$username = $_REQUEST["username"];
$userscore = $_REQUEST["userscore"];
$userid = $_REQUEST["userid"];
if(!$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

$query1 = "UPDATE weeklyleaderboard SET score= '$userscore' where id='$userid'";
mysqli_query($connection, $query1);

$query2 = "UPDATE monthlyleaderboard SET score= '$userscore' where id='$userid'";
$query3 = "UPDATE alltimeleaderboard SET score= '$userscore' where id='$userid'";

mysqli_query($connection, $query2);
mysqli_query($connection, $query3);
?>