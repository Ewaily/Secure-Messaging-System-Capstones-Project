<?php
session_start();
if(!$_SESSION["userid"]){
	@ require_once ("index.html");
}
else{
	@ require_once ("home.php");
}
?>

