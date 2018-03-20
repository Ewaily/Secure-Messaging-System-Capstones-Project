<?php
session_start();
if(!$_SESSION["userid"]){
	   header("Location:index.php");
}
?>
<html>
<head>
	<title>Cybersecurity Capstone Project</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<script src="https://code.jquery.com/jquery-2.1.3.js" integrity="sha256-goy7ystDD5xbXSf+kwL4eV6zOPJCEBD1FBiCElIm+U8=" crossorigin="anonymous"></script>
	
	
</head>


<body>
	<div id="header"><img src="images/header.png" /></div>
	<div id="menu">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="inbox.php">Inbox</a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="logout.php">Log out</a></li>
	</ul>
	</div>
	<div class="sidebar">
	<h2>Quick Links</h2>				 
	<p>►&nbsp <a href="https://www.heroku.com">Heroku</a></p>
	<p>►&nbsp <a href="https://www.coursera.org">Coursera</a></p>
	<p>►&nbsp <a href="https://builditbreakit.org/">Build it Break it Fix it</a></p>
	<p>►&nbsp <a href="https://www.umd.edu">University of Maryland</a></p>
	<p>►&nbsp <a href="https://www.coursera.org/specializations/cyber-security">Cybersecurity Specialization</a></p>
	</div>
	
	<div class="contents">
		<h2>Welcome, <?php @ require_once ("home-controller.php"); ?></h2>
		<h1 align="center">Welcome to the Cybersecurity Capstone Project!</h1>
		

	</div>

   
	
	
	</p>
	</div>

	<div id="footer">© 2018 Cybersecurity Capstone Project . All rights reserved | Muhammad Ewaily</div>
</body>

</html>