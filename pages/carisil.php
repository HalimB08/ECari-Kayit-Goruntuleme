<?php 
require_once("../codes/userscripts/settings.php");
if (!isset($_SESSION["username"])) {
	header("Location: ../login.php");
}

if(isset($_POST["gelenID"])){
	try {
		require_once("../codes/database/config.php");
		$conn = new PDO(sprintf("mysql:host=%s;dbname=%s;",$config["servername"],$config["db_name"]),$config["username"],$config["password"]);
		$sql = "delete from cariler where id = '{$_POST['gelenID']}';";
		$conn->exec($sql);
		header("Location: ../mainscreen.php?git=cariduzenle");
	} catch (Exception $e) {
		echo "Kayıt Silme Hatası!";
		echo '<a href="../mainscreen.php" class="btn btn-primary">AnaSafaya Git</a>';
	}
}
else{
	header("Location: ../mainscreen.php?git=cariduzenle");
}