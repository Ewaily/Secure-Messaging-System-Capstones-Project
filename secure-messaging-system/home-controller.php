<?php
session_start();

$userid = $_SESSION["userid"];

$conn = new mysqli("us-cdbr-iron-east-05.cleardb.net", "be715b6867744c", "c03df2df", "heroku_0e8b45069f71a9b");


$result = $conn->query("SELECT u_name FROM users WHERE User_id = '$userid' ; ");


if($result){
	$user = $result->fetch_assoc();
	echo $user['u_name'];

}

?>