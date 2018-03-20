<html>


<head>
	<title>Cybersecurity Capstone Project</title>
	<link rel="stylesheet" type="text/css" href="myStyle.css">
</head>


<body>
	<div id="header"><img src="images/header.png" /></div>
	<div id="menu">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="inbox.php">Inbox</a></li>
		<li><a href="about.html">About</a></li>
		<?php
			session_start();
				if($_SESSION["userid"]){
					echo '<li><a href="logout.php">Log out</a></li>';
			}?>
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
	<h1>About this specialization</h1>
	<p>The Cybersecurity Specialization covers the fundamental concepts underlying the
construction of secure systems, from the hardware to the software to the human-computer interface,
with the use of cryptography to secure interactions. These concepts are illustrated with examples drawn from modern practice, and augmented with hands-on exercises 
involving relevant tools and techniques.Successful participants will develop a way of thinking that is security-oriented, better understanding 
how to think about adversaries and how to buld systems that defend against them. </p>

	<h1>About Next Technology Leaders (NTL)</h1>
	<p>H.E. Mr. President Abdel Fattah ElSisi launched the technology learning initiative “Next Technology Leaders (NTL)” to build capacity of young calibers on the latest information, communications, and electronics technologies. The Ministry of Communications and Information Technology (MCIT) leads executing the NTL Initiative through the Technology Innovation and Entrepreneurship Center of the Information Technology Industry Development Agency. Capacity building is to be orchestrated through the establishment of integral, practical, high-quality learning ecosystem, centered on the learner and supported by a distinctive content prepared through the collaborative effort of top universities and leading companies, and is made available on globally leading MOOC platforms. The ecosystem is inclusive of a nationwide network of study group mentors that coaches learners and stimulate the learning process. A network of project reviewers also assess and improve the learning outcomes.

</p>
	</div>
	

	<div id="footer">© 2018 Cybersecurity Capstone Project . All rights reserved | Muhammad Ewaily</div>
</body>

</html>