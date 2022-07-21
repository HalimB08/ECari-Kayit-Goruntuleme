<?php 
require_once("codes/database/config.php");
if (!isset($_SESSION["username"])) {
	header("Location: mainscreen.php");	
}
if(isset($_POST["oldpass"])){
	if ($_POST["newpass"] == $_POST["newpassagain"]) {
		$conn = new PDO(sprintf("mysql:host=%s;dbname=%s;",$config["servername"],$config["db_name"]),$config["username"],$config["password"]);
		$sql = "select password from users where id={$_SESSION['userID']};";
		$sonuc = $conn->query($sql);
		$sifre;
		foreach ($sonuc as $k) {
			$sifre= $k["password"];
		}
		if ($sifre == $_POST['oldpass']) {
			$sql = "update users set password = {$_POST['newpass']} where id = {$_SESSION['userID']};";
			$sonuc = $conn->exec($sql);
			header("Location: mainscreen.php");
		}
		else{
			$passfalseError = "error";
		}
	}
	else{
		$passError = "error";
	}
}
?>
<form method="POST">
	<div class="card" style="background-color: #CCFFFF;margin:10px 10px 10px 10px;">
		<div class="card-header">
			Parola Değiştirme Ekranı
		</div>
		<div class="card-body">
			<h5 class="card-title">Parola Değiştirme</h5>
			<p style="color:red;" <?= isset($passfalseError) ?  '': 'hidden';?>>Kayıt Gerçekleşemedi! Eski şifrenizi yanlış girdiniz!</p>
			<p style="color:red;" <?= isset($passError) ?  '': 'hidden';?>>Kayıt Gerçekleşemedi! Şifreniz Uyuşmuyor!</p>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Eski Şifreniz:</label>
				<input type="password" name="oldpass" class="form-control" id="exampleFormControlInput1" placeholder="********">
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Yeni Şifreniz:</label>
				<input type="password" name="newpass" class="form-control" id="exampleFormControlInput1" placeholder="********">
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Yeni Şifreniz Tekrar:</label>
				<input type="password" name="newpassagain" class="form-control" id="exampleFormControlInput1" placeholder="********">
			</div>
			<button type="submit" class="btn btn-primary">Kaydet</button>
		</div>
	</div>
</form>