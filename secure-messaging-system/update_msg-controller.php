<?php
session_start();

$msg_id = $_POST['msg_id'];

$conn = new mysqli("us-cdbr-iron-east-05.cleardb.net", "be715b6867744c", "c03df2df", "heroku_0e8b45069f71a9b");


$result = $conn->query("UPDATE msg SET state = '1' WHERE msg_id = '$msg_id'; ");
$result2 = $conn->query("SELECT * FROM msg WHERE msg_id = '$msg_id'; ");



if($result){
    $user = $result2->fetch_assoc();
    header('Content-type: application/json');
    echo json_encode(array("status"=>$result, "u_id"=>$user['sender_id'] ));
}
else{
	echo "Error";
}

?>