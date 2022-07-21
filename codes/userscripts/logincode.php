<?php
require_once("settings.php");
require_once("codes/database/config.php");
$errorhata = 0;
if (isset($_SESSION["username"])) {
	header("Location: mainscreen.php");	
}

if(count($_POST) != 0){
	try{
		$conn = new PDO(sprintf("mysql:host=%s;dbname=%s;",$config["servername"],$config["db_name"]),$config["username"],$config["password"]);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		//try{
		$sql = sprintf("select username, id from users where username = '%s' and password = '%s';",$_POST['username'],$_POST['password']);
		$sonuc = $conn->query($sql);
		$kadi = ""; 
		$kadiID = "";
		foreach ($sonuc as $k) {
			$kadi = $k["username"];
			$kadiID = $k["id"];
		}
		echo $kadi;
		if($kadi != ""){
			$_SESSION['username'] = $kadi;
			$_SESSION['userID'] = $kadiID;
			header("Location: index.php");
		}
		else{
			$errorhata = 1;
		}
		//}
		//catch(PDOException $e){
			//echo "Sorgulama yapılırken bir hata meydana geldi. Hata : ".$e;
		//}
	}
	catch(PDOException $e){
		echo "Uygulama hafıza problemi var. Hata : " . $e;
	}	
}

