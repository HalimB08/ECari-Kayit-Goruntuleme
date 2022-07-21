<?php 
require_once("codes/database/config.php");
if (!isset($_SESSION["username"])) {
	header("Location: ../mainscreen.php");	
}
$conn = new PDO(sprintf("mysql:host=%s;dbname=%s;",$config["servername"],$config["db_name"]),$config["username"],$config["password"]);

if(isset($_POST['gelenID'])){
	$sql = "select * from parabirimleri where id = {$_POST['gelenID']};";
	$sonuc = $conn->query($sql);
	foreach ($sonuc as $gelenveri) 
	{		
		?>
		<div class="card" style="margin:10px 10px 10px 10px;">
			<div class="card-header">
				Para Birimi Güncelleme
			</div>
			<div class="card-body">
				<h5 class="card-title">Güncelleme İşlemi</h5>
				<h2 class="card-title" style="color:red;" <?= isset($saveerror) ? '' : 'hidden'; ?>>Güncelleme Durumu : Başarısız</h2>
				<form method="POST">			
					<div class="mb-3">
						<input type="text" name="id" value="<?= $gelenveri['id'] ?>" hidden>
						<label for="exampleInputEmail2" class="form-label">Para Birimi</label>
						<input type="text" class="form-control" id="exampleInputEmail2" name="parabirimadi" 
						value="<?php echo "{$gelenveri['parabirimadi']}"; ?>" aria-describedby="emailHelp">
					</div>
					<button type="submit" class="btn btn-primary">Para Birimi Güncelle</button>
				</form>
			</div>
		</div>

		<?php
	}
}


if (isset($_POST['parabirimadi'])) {
	$sql = sprintf("update parabirimleri set parabirimadi='%s' where id like %d;",
		$_POST['parabirimadi'],$_POST['id']);
	$conn->exec($sql);
	header("Location: mainscreen.php?git=pbirimiliste");	
}
?>
