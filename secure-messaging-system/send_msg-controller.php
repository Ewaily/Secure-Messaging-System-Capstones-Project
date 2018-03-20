<?php
session_start();

$userid = $_POST['userid'];
$txt = $_POST['txt'];
$sender = $_POST['sender'];

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

$enc_txt = encxdec('encrypt', $txt, $userid);

$conn = new mysqli("us-cdbr-iron-east-05.cleardb.net", "be715b6867744c", "c03df2df", "heroku_0e8b45069f71a9b");

$result = $conn->query("INSERT INTO msg(sender_id, receiver_id, msg_txt, state) VALUES ('$sender', '$userid', '$enc_txt', '0');");

if($result){
	header('Content-type: application/json');
	echo json_encode(array("status"=>$result , "my"=>$sender));
}
else{
	echo "Error";
}

?>