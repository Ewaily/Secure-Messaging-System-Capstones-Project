<?php

$username = $_POST['Username'];
$password = hash("sha512", $_POST['pass']);

$conn = new mysqli("us-cdbr-iron-east-05.cleardb.net", "be715b6867744c", "c03df2df", "heroku_0e8b45069f71a9b");


$result = $conn->query("SELECT * FROM users WHERE u_name = '$username' AND password = '$password'; ");


if($result){
	$user = $result->fetch_assoc();
	session_start();
	$_SESSION["userid"] = $user['User_id'];
	header('Content-type: application/json');
	echo json_encode(array("status"=>$result, "u_id"=>$user['User_id'] ));


}
else{
	echo "Error";
}

?>