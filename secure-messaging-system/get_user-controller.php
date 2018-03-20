<?php
session_start();

$uname = $_POST['uname'];

$conn = new mysqli("us-cdbr-iron-east-05.cleardb.net", "be715b6867744c", "c03df2df", "heroku_0e8b45069f71a9b");


$result = $conn->query("SELECT * FROM users WHERE u_name = '$uname' ; ");


if($result){
	$user = $result->fetch_assoc();
	$_SESSION["userid"] = $user['User_id'];
	header('Content-type: application/json');
	echo json_encode(array("status"=>$result, "fname"=>$user['f_name'], "lname"=>$user['l_name'], "userid"=>$user['User_id'] ));


}
else{
	echo "Error";
}

?>