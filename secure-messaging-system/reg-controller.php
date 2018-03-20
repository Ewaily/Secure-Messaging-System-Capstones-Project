<?php


$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$username = $_POST['uname'];
$password = hash("sha512", $_POST['pass']);
$ques = $_POST['ques'];
$ans = $_POST['ans'];
$u_id = hash("sha256", microtime());


$conn = new mysqli("us-cdbr-iron-east-05.cleardb.net", "be715b6867744c", "c03df2df", "heroku_0e8b45069f71a9b");
$result = $conn->query("INSERT INTO users(User_id, f_name, l_name, u_name, password, question, answer) VALUES ('$u_id', '$firstname', '$lastname', '$username', '$password','$ques','$ans');");

if($result){
	header("Location: ./index.html");
}
else{
	echo "Error";
}

?>