<?php

$username = $_POST['uname'];
$password = hash("sha512", $_POST['pass']);
$ques = $_POST['ques'];
$ans = $_POST['ans'];

$conn = new mysqli("us-cdbr-iron-east-05.cleardb.net", "be715b6867744c", "c03df2df", "heroku_0e8b45069f71a9b");

$result = $conn->query("SELECT * From users WHERE u_name = '$username' AND question = '$ques' AND answer  = '$ans';");

if(mysqli_fetch_assoc($result) > 0){
	$result2 = $conn->query("UPDATE users SET password = '$password' WHERE u_name = '$username';");
	if($result2){
		header('Content-type: application/json');
		echo json_encode(array("status"=>"success"));
	}
}
else{
	header('Content-type: application/json');
	echo json_encode(array("status"=>"fail"));
}

?>