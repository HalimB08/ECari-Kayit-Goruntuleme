<?php 
require_once("codes/userscripts/settings.php"); 
if (!isset($_SESSION["username"])) {
	header("Location: login.php");
}
else{
	header("Location: mainscreen.php");	
}
