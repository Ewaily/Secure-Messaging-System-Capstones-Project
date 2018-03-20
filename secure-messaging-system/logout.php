<?php 
session_start();
$_SESSION["userid"] = "";
unset($_COOKIE['PHPSESSID']);
session_destroy();


@ require_once ("index.html");
?>