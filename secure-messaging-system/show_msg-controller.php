<?php
session_start();

$username = $_SESSION["userid"];

function xorIt($string, $key, $type = 0)
{
        $sLength = strlen($string);
        $xLength = strlen($key);
        for($i = 0; $i < $sLength; $i++) {
                for($j = 0; $j < $xLength; $j++) {
                        if ($type == 1) {
                                //decrypt
                                $string[$i] = $key[$j]^$string[$i];
                                 
                        } else {
                                //crypt
                                $string[$i] = $string[$i]^$key[$j];
                        }
                }
        }
        return $string;
}
 
function encxdec($op, $str, $key){
    if($op == 'encrypt'){
        return  base64_encode(xorIt($str, $key));
        echo "enc";
    }
    else if ($op == 'decrypt'){
        return xorIt(base64_decode($str), $key, 1);
    }
}


$conn = new mysqli("us-cdbr-iron-east-05.cleardb.net", "be715b6867744c", "c03df2df", "heroku_0e8b45069f71a9b");
// $result1 = $conn->query("SELECT users.f_name, users.l_name, users.u_name, msg.msg_txt FROM users INNER JOIN msg ON users.User_id = msg.receiver_id WHERE sender_id = '$username'; ");
$result = $conn->query("SELECT users.f_name, users.l_name, users.u_name, msg.msg_txt, msg.state, msg.msg_id FROM users INNER JOIN msg ON users.User_id = msg.sender_id WHERE receiver_id = '$username'; ");


if($result){
	$rows = array();
	$msgs = array();
    while($r = mysqli_fetch_assoc($result)) {
    	$text = encxdec('decrypt', $r['msg_txt'], $username); 
    	$r['msg_txt'] = $text;
        $rows[] = $r;
    }
    header('Content-type: application/json');
    echo json_encode($rows);
}
else{
	echo "Error";
}

?>