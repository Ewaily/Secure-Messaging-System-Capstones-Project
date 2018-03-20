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
	
	<div class="msgs">
	
	<div class="currUsr">
	
	<label id="fname"></label> <label id="lname"></label> <hr>
	
	</div>
	
	<div class="nmsg" >
		<div id="msg">
		</div>
	
	<input class="newmsg" type="text" id="newmsg" placeholder="   Type a message" size="100" required data-userid="5b" onkeypress="send_msg(event, this.getAttribute('data-userid'), this.value)" />
	
	</div>
	
	</div>
	<div class="recent">
	
	<div class="nusr">
	
	<input class="newusr" type="text" id="newusr" placeholder="   Type a username" size="25" required onkeypress="new_user(event, this.value)" />
	
	</div>

	<p id="unread_msg"></p>
		
	
	</div>
	
	
	
	
	
		</div>

   
	
	
	</p>
	</div>

	<div id="footer">© 2018 Cybersecurity Capstone Project . All rights reserved | Muhammad Ewaily</div>
</body>



<script>

		$.ajax({
				type: "POST",
				"userid": "<?php echo $_SESSION["userid"];?>",
				url: "./show_msg-controller.php",
				dataType: "application/json"

			})
		.complete(function (res) {
					console.log(res);
					var res = JSON.parse(res.responseText);
					console.log(res);

					for(i = res.length-1; i >= 0 ; i--){

						p = '<div class="rec1"  onclick="show_msg(&quot;'+ res[i]["f_name"]+'&quot;, &quot;'+ res[i]["l_name"]+'&quot; , &quot;'+ res[i]["msg_txt"] +'&quot;, &quot;'+ res[i]["msg_id"] +'&quot;)">';

						if(res[i]["state"] == 0){
						p += '<label id="'+ res[i]["msg_id"] +'" style="font-weight: 900;">'+ res[i]["u_name"] + '</label>';

						}
						else{
						p += '<label id="'+ res[i]["msg_id"] +'" style="font-weight: 200;">'+ res[i]["u_name"] + '</label>';
						}
						p += '</div>';

						document.getElementById("unread_msg").innerHTML += p ;
					}

								
							});


function show_msg(fname, lname, txt, id){
	document.getElementById("fname").innerHTML = fname;
	document.getElementById("lname").innerHTML = lname;
	document.getElementById("msg").innerHTML = txt;
	

	$.ajax({
				type: "POST",
				url: "./update_msg-controller.php",
				data: {
					"msg_id": id
				},
				dataType: "application/json"

			})
		.complete(function (res) {
					console.log(res);
					var res = JSON.parse(res.responseText);
					console.log(res);
					if(res.status){
						document.getElementById(id).style.fontWeight = "200";
						$('#newmsg').attr('data-userid', res["u_id"]);
					}
					
				});

 }

function new_user(event, uname){
	
	if(event.keyCode == 13){
		console.log(uname);
		$.ajax({
				type: "POST",
				url: "./get_user-controller.php",
				data: {
					"uname": uname
				},
				dataType: "application/json"

			})
		.complete(function (res) {
					console.log(res);
					var res = JSON.parse(res.responseText);
					console.log(res);
					if(res.fname){
						document.getElementById("fname").innerHTML = res["fname"];
						document.getElementById("lname").innerHTML = res["lname"];
						$('#newmsg').attr('data-userid', res["userid"]);
						//console.log($('#newmsg').attr('data-userid'));
					}
					else{
						alert("User name does not Exist!");
						document.getElementById("newusr").value = "";
					}
					
				});
	}
}

function send_msg(event, userid, txt){
	if(event.keyCode == 13){
		console.log(userid);
		console.log(txt);

		$.ajax({
				type: "POST",
				url: "./send_msg-controller.php",
				data: {
					"userid": userid,
					"sender":"<?php echo $_SESSION["userid"] ?>",
					"txt": txt
				},
				dataType: "application/json"

			})
		.complete(function (res) {
					console.log(res);
					var res = JSON.parse(res.responseText);
					console.log(res);
					console.log("<?php echo $_SESSION["userid"] ?>");
					alert("message sent succefully!");
					document.getElementById("newmsg").value = "";
					
					
				});
	}

}

</script>
</html>