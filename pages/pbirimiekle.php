<?php 
require_once("codes/database/config.php");
if (!isset($_SESSION["username"])) {
	header("Location: mainscreen.php");	
}
if(isset($_POST["parabirimadi"])){
	try {
		$conn = new PDO(sprintf("mysql:host=%s;dbname=%s;",$config["servername"],$config["db_name"]),$config["username"],$config["password"]);
		$sql = "insert into parabirimleri(parabirimadi,userID)
		values ('{$_POST["parabirimadi"]}','{$_SESSION['userID']}');";
		$conn->exec($sql);
		header("Location: mainscreen.php?git=pbirimiliste");
	} catch (Exception $e) {
		$saveerror = "error";
	}
}
?>
<div class="card" style="margin:10px 10px 10px 10px;background-color: #CCFFFF;">
	<div class="card-header">
		Para Birimi Ekleme Kaydetme
	</div>
	<div class="card-body">
		<h5 class="card-title">Kayıt İşlemi</h5>
		<h2 class="card-title" style="color:red;" <?= isset($saveerror) ? '' : 'hidden'; ?>>Kayıt Durumu : Başarısız</h2>
		<form method="POST">			
			<div class="mb-3">
				<label for="exampleInputEmail2" class="form-label">Para Birimi</label>
				<input type="text" class="form-control" id="exampleInputEmail2" name="parabirimadi" value="<?= $_POST['parabirimadi'] ?? '' ?>" aria-describedby="emailHelp">
			</div>
			<button type="submit" class="btn btn-primary">Para Birimi Ekle</button>
		</form>
	</div>
</div>