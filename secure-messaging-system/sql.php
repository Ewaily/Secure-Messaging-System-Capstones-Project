<?php



$conn = new mysqli("heroku_8129063fdb516cd", "b9559021fd88d4", "5f7a3d0c", "");
$result = $conn->query("INSERT INTO users(User_id, f_name, l_name, u_name, password, question, answer) VALUES ('$u_id', '$firstname', '$lastname', '$username', '$password','$ques','$ans');");

if($result){
	header("Location: ./index.html");
}
else{
	echo "Error";
}

?>