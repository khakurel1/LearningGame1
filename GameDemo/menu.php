<!-- Menu -->

<?php
//probably could be much shorter (just take part of the check_login function if it doesn't require a db connection)
session_start();

include("functions.php");
$dbhost = "localhost";
$dbuser = "felleson1";
$dbpass = "S218277";
$dbname = "Game1";
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$x = check_login($con);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>VASA-Wiggin SpaceDash</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'><link rel="stylesheet" href="./style.css">

</head>
<body>

  <style>
  *{
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
  }
  body{
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: black;
  }
  ul{
      position: relative;
      display: flex;
      flex-direction: column;
      gap: 30px;
  }
  ul li{
      position: relative;
      list-style: none;
  }
  ul li a{
      position: relative;
      font-size: 4em;
      text-decoration: none;
      line-height: 1em;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: transparent;
      -webkit-text-stroke: 1px rgba(255, 255, 255, 0.5);
  }
  ul li a::before{
      content: attr(data-text);
      position: absolute;
      color: var(--clr);
      width: 0;
      overflow: hidden;
      transition: 1s ;
      border-right: 8px solid var(--clr);
      -webkit-text-stroke: 1px var(--clr);
  }
  ul li a:hover::before{
      width: 100%;
      filter: drop-shadow(0 0 25px var(--clr));
  }
</style>
<link rel="stylesheet" href="./starstyle.css">
<!-- partial:index.partial.html -->

<ul>
            <li style="--clr:#00ade1">
                <a href="./index.php" data-text="&nbsp;Play">&nbsp;Play&nbsp;</a>
            </li>
            <li style="--clr:#fcf86a">
                <a href="../Leaderboard/leaderboard6.php" data-text="&nbsp;Leaderboard">&nbsp;Leaderboard&nbsp;</a>
            </li>
            <!-- <li style="--clr:#ffdd1c">
                <a href="" data-text="&nbsp;Challenges">&nbsp;Challenges&nbsp;</a>
            </li> -->
            <li style="--clr:#ff6493">
                <a href="https://forms.gle/LrFVFtCa8v3Rsn9j8" data-text="&nbsp;Report&nbsp;Bug">&nbsp;Report Bug&nbsp;</a>
            </li>
            <li style="--clr:#00dc82">
                <a href="./logout.php" data-text="&nbsp;Logout">&nbsp;Logout&nbsp;</a>
            </li>

        </ul>



    <div id="stars"></div>
    <div id="stars2"></div>
    <div id="stars3"></div>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
