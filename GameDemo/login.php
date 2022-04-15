<!-- Login -->

<?php

$dbhost = "localhost";
$dbuser = "felleson1";
$dbpass = "S218277";
$dbname = "Game1";


if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

	// include("connection.php");
	include("functions.php");

		//check if there's already an active session. if so, redirect to menu page.
		if(isset($_SESSION['user_id']))
		{
			$id = $_SESSION['user_id'];
			$query = "select * from LoginCreds where user_id = '$id' limit 1";

			$result = mysqli_query($con,$query);
			if($result && mysqli_num_rows($result) > 0)
			{
				header("Location: menu.php");
				die;
			}
		}

	// check for user input, check username and pw against database
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from LoginCreds where username = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);

					if($user_data['password'] === $password)
					{
						echo 'correct';
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: ./menu.php");
						die;
					}
				}
			}

			echo "wrong username or password!";
		}else
		{
			echo "missing username and/or password!";
		}
	}

?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>LG1 Login</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
	<link rel="stylesheet" href="./starstyle.css">
	<!-- <link rel="stylesheet" href="./style.css"> -->

</head>
<body>
<script>
/*

inspiration:
https://dribbble.com/shots/2292415-Daily-UI-001-Day-001-Sign-Up

*/

let form = document.querySelector('form');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  return false;
});


</script>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
}

body {
  background: black;
  font-family: "Rubik", sans-serif;
}

.login-form {
  background: #fff;
  width: 500px;
  margin: 65px auto;
  display: flex;
  flex-direction: column;
  border-radius: 4px;
  box-shadow: 0 2px 25px rgba(0, 0, 0, 0.2);
}
.login-form h1 {
  padding: 35px 35px 0 35px;
  font-weight: 300;
}
.login-form .content {
  padding: 35px;
  text-align: center;
}
.login-form .input-field {
  padding: 12px 5px;
}
.login-form .input-field input {
  font-size: 16px;
  display: block;
  font-family: "Rubik", sans-serif;
  width: 100%;
  padding: 10px 1px;
  border: 0;
  border-bottom: 1px solid #747474;
  outline: none;
  transition: all 0.2s;
}
.login-form .input-field input::-moz-placeholder {
  text-transform: uppercase;
}
.login-form .input-field input:-ms-input-placeholder {
  text-transform: uppercase;
}
.login-form .input-field input::placeholder {
  text-transform: uppercase;
}
.login-form .input-field input:focus {
  border-color: #222;
}
.login-form a.link {
  text-decoration: none;
  color: #747474;
  letter-spacing: 0.2px;
  text-transform: uppercase;
  display: inline-block;
  margin-top: 20px;
}
.login-form .action {
  display: flex;
  flex-direction: row;
}
.login-form .action button {
  width: 100%;
  border: none;
  padding: 18px;
  font-family: "Rubik", sans-serif;
  cursor: pointer;
  text-transform: uppercase;
  background: #e8e9ec;
  color: #777;
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 0;
  letter-spacing: 0.2px;
  outline: 0;
  transition: all 0.3s;
}
.login-form .action button:hover {
  background: #d8d8d8;
}
.login-form .action button:nth-child(2) {
  background: #2d3b55;
  color: #fff;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 4px;
}
.login-form .action button:nth-child(2):hover {
  background: #3c4d6d;
}




/* comets animations */

#comets{
  z-index: -1;
	position:relative;
  top:-150px;
  width:100vw;
  text-align: left;
  height: 100%;
  min-height: 900px;
  overflow:hidden;
}

#comets i {
  display: inline-block;
  width: 250px;
  height: 150px;position:absolute;
  border-radius: 5% 40% 70%;
  box-shadow: inset 0px 0px 1px #294b67;
  border: 1px solid #333;
  z-index: 1;
  background-color: #fff;
  opacity: .7;
  -webkit-animation: falling 10s 10s infinite;
  -webkit-animation-timing-function:ease-in;
	z-index: -1;
}


#comets i:nth-child(1){
  left: 50vw;
  height:73px;
  width:3px;
  background-color: #fff;
}
#comets i:nth-child(3){
  height:11px;
  width:3px;
  -webkit-animation: falling3 8s 3s infinite;
  left: 10vw;
background-color: #fff;
}
#comets i:nth-child(2){
  -webkit-animation: falling2 6s 1s infinite;
  left: 30vw;
  height:70px;
  width:4px;
  background-color: #fff;

}




@-webkit-keyframes falling {

  0% {
    -webkit-transform: translate3d(100px,0px,0px) rotate(160deg);
  }

  3% {
    -webkit-transform:
    translate3d(450px,900px,0) rotate(160deg);
    opacity: 0;
  }
  100% {
    -webkit-transform:
    translate3d(450px,900px,0) rotate(160deg);
    opacity: 0;
  }
}

@-webkit-keyframes falling3 {
 0% {
  -webkit-transform: translate3d(0,0,0) rotate(150deg);
}

10% {
  -webkit-transform: translate3d(430px,640px,0) rotate(150deg);
  opacity: 0;
}

100% {
  -webkit-transform: translate3d(430px,640px,0) rotate(150deg);
  opacity: 0;
}
}

@-webkit-keyframes falling2 {
 0% {
  -webkit-transform:translate3d(100px,0,0) rotate(130deg);
}

15% {
  -webkit-transform:translate3d(800px,580px,0) rotate(130deg);
  opacity: 0;
}

100% {
  -webkit-transform: translate3d(800px,680px,0) rotate(180deg);
  opacity: 0;
}
}
</style>

<!-- partial:index.partial.html -->
<div class="login-form">
  <form method="post">
    <h1>Login</h1>
    <div class="content">
      <div class="input-field">
        <input type="username" name ="username" placeholder="username" autocomplete="nope">
      </div>
      <div class="input-field">
        <input type="password" name = "password" placeholder="Password" autocomplete="new-password">
      </div>

    </div>
    <div class="action">

      <button type="submit">Sign in</button>
    </div>
  </form>
</div>
<!-- partial -->
  <!-- <script  src="./script.js"></script> -->

	<div id="stars"></div>
	<div id="stars2"></div>
	<div id="stars3"></div>

	<div id="comets">
  <i></i>
  <i></i>
  <i></i>
</div>

</body>
</html>
