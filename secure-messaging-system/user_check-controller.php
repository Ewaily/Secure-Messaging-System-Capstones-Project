<?php

if(isset($_POST["uname"])){
	$uname = $_POST["uname"];
	$conn = new mysqli("us-cdbr-iron-east-05.cleardb.net", "be715b6867744c", "c03df2df", "heroku_0e8b45069f71a9b");

	$result = $conn->query("SELECT * FROM users WHERE u_name = '$uname';");

	if(mysqli_num_rows($result) > 0){
		header('Content-type: application/json');
		echo json_encode(array("status"=>1));
	}
	else{
		header('Content-type: application/json');
		echo json_encode(array("status"=>0));
	}

}


?>