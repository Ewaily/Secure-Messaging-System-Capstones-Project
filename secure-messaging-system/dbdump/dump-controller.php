<?php

$conn = new mysqli("us-cdbr-iron-east-05.cleardb.net", "be715b6867744c", "c03df2df", "heroku_0e8b45069f71a9b");
$result = $conn->query("SELECT * FROM `msg` WHERE 1");


echo '<table style="width:100%; border: 1px solid black;">';
	echo '<th style="border: 1px solid black;">message ID</th> <th style="border: 1px solid black;">Sender ID</th> <th style="border: 1px solid black;">Receiver ID</th> <th style="border: 1px solid black;">Message Text</th> <th style="border: 1px solid black;">State</th>';

while($r = mysqli_fetch_assoc($result)) {
	echo "<tr>";
		echo '<td style="border: 1px solid black;"">'. $r['msg_id']. '</td>';
		echo '<td style="border: 1px solid black;"">'. $r['sender_id']. '</td>';
		echo '<td style="border: 1px solid black;"">'. $r['receiver_id']. '</td>';
		echo '<td style="border: 1px solid black;"">'. $r['msg_txt']. '</td>';
		echo '<td style="border: 1px solid black;"">'. $r['state']. '</td>';
	echo '</tr>';
	
}
echo "</table>";

?>