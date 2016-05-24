<?php  include("./inc/connect.inc.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/indexStyle.css">
</head>



<body>

<div id="headerMenu">
<div id="header">
<div id="logo">

</div>
<div id="soc">
<ul>
	<li><img src="css/icons/facebook.png"></li>
	<li><img src="css/icons/twitter.png"></li>
	<li><a href="https://www.instagram.com/mtmaniacslv/"><img src="css/icons/instagram.png"></a></li>
	<li><img src="css/icons/youtube.png"></li>
	</ul>
	</div>
</div>
<div id="menuBar">
	<div id="menu">
	<div id="loginDiv">
	<form id="loginForm" action="register.php" method="POST">
		<input type="text" name="user_login" placeholder=" Lietotājvārds">
		<input type="password" name="password_login" placeholder=" Parole">
		<input type="submit" name="ielogoties" placeholder="Ieiet">
	</form>
	</div>
		<ul>
			<a href="#"><li>Reģistrēties</li></a>
			<a href="#"><li>Ieiet</li></a>
			<a href="#"><li>Par mums</li></a>
		</ul>
	</div>