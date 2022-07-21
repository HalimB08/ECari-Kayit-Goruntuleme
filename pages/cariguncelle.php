<?php 

require_once("codes/database/config.php");
if (!isset($_SESSION["username"])) {
	header("Location: ../mainscreen.php");	
}
$conn = new PDO(sprintf("mysql:host=%s;dbname=%s;",$config["servername"],$config["db_name"]),$config["username"],$config["password"]);
if(isset($_POST['gelenID'])){
	$sql = "select * from cariler where id = {$_POST['gelenID']} ;";
	$sonuc = $conn->query($sql);
	foreach ($sonuc as $gelenveri) {		
		?>
		<div class="card" style="margin:10px 10px 10px 10px;background-color: #CCFFFF;">
			<div class="card-header">
				Cari Güncelleme
			</div>
			<div class="card-body">
				<h5 class="card-title">Güncelleme İşlemi</h5>
				<form method="POST">				
					<div class="mb-3">
						<label for="exampleInputEmail2" class="form-label">Şirket Adı</label>
						<input type="text" class="form-control" id="exampleInputEmail2" name="sirketadi" 
						value="<?php echo "{$gelenveri['sirketadi']}"; ?>" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Adı Soyadı</label>
						<input type="text" class="form-control" id="exampleInputEmail1" name="adisadi" 
						value="<?php echo "{$gelenveri['adisadi']}"; ?>" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail3" class="form-label">Telefon 1</label>
						<input type="text" class="form-control" id="exampleInputEmail13" name="tel1" 
						value="<?php echo "{$gelenveri['tel1']}"; ?>" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail4" class="form-label">Telefon 2</label>
						<input type="text" class="form-control" id="exampleInputEmail4" name="tel2" 
						value="<?php echo "{$gelenveri['tel2']}"; ?>" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlTextarea5" class="form-label">Adres Bilgisi</label>
						<textarea class="form-control" id="exampleFormControlTextarea5"  name="adresbilgisi" rows="3"><?php echo "{$gelenveri['adres']}"; ?></textarea>
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail6" class="form-label">Vergi Dairesi</label>
						<input type="text" class="form-control" id="exampleInputEmail6" 
						value="<?php echo "{$gelenveri['vergidairesi']}"; ?>" name="vergidairesi" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail7" class="form-label">Vergi Numarası</label>
						<input type="text" class="form-control" id="exampleInputEmail7" 
						value="<?php echo "{$gelenveri['vergino']}"; ?>" name="vergino" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail9" class="form-label">Grubu Seçimi</label>
						<select class="form-select form-select-lg mb-3" id="exampleInputEmail9" name="grubsecimi" aria-label=".form-select-lg example">
							<option <?= $_POST['grubu'] ?? 'selected' ?>>Lütfen Grubu Seçiniz</option>
							<?php 
							$conn = new PDO(sprintf("mysql:host=%s;dbname=%s;",$config["servername"],$config["db_name"]),$config["username"],$config["password"]);
							$sql = "select * from grublar where userID = {$_SESSION['userID']};";
							$sonuc = $conn->query($sql);
							$say1 = 1;
							foreach ($sonuc as $k) {				
								if ($gelenveri['grubu'] == $say1) {
									printf("<option value='%d' selected>%s</option>",$say1,$k["grubadi"]);
								}
								else{
									printf("<option value='%d'>%s</option>",$say1,$k["grubadi"]);
								}
								$say1++;						
							}
							?>
						</select>
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail10" class="form-label">Yetkili Kişi</label>
						<input type="text" class="form-control" id="exampleInputEmail10" 
						value="<?php echo "{$gelenveri['yetkilikisi']}"; ?>" name="yetkilikisi" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail11" class="form-label">Fax</label>
						<input type="text" class="form-control" id="exampleInputEmail11" 
						value="<?php echo "{$gelenveri['fax']}"; ?>" name="fax" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail12" class="form-label">Cep</label>
						<input type="text" class="form-control" id="exampleInputEmail12" 
						value="<?php echo "{$gelenveri['cep']}"; ?>" name="cep" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail13" class="form-label">İlçe/Köy</label>
						<input type="text" class="form-control" id="exampleInputEmail13" 
						value="<?php echo "{$gelenveri['ilcekoy']}"; ?>" name="ilcekoy" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail14" class="form-label">Şehir</label>
						<input type="text" class="form-control" id="exampleInputEmail14" 
						value="<?php echo "{$gelenveri['sehir']}"; ?>" name="sehir" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail15" class="form-label">Bölge</label>
						<input type="text" class="form-control" id="exampleInputEmail15" 
						value="<?php echo "{$gelenveri['bolge']}"; ?>" name="bolge" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail16" class="form-label">Ülke</label>
						<input type="text" class="form-control" id="exampleInputEmail16" 
						value="<?php echo "{$gelenveri['ulke']}"; ?>" name="ulke" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail17" class="form-label">Posta Kodu</label>
						<input type="text" class="form-control" id="exampleInputEmail17" 
						value="<?php echo "{$gelenveri['postakodu']}"; ?>" name="postakodu" aria-describedby="emailHelp" required>
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail18" class="form-label">Web Adresi</label>
						<input type="text" class="form-control" id="exampleInputEmail18" 
						value="<?php echo "{$gelenveri['webadresi']}"; ?>" name="webadresi" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail19" class="form-label">Para Birimi Seçimi</label>
						<select class="form-select form-select-lg mb-3" id="exampleInputEmail19"  name="parabirimi" aria-label=".form-select-lg example">
							<option <?= $_POST['parabirimi'] ?? 'selected' ?>>Lütfen Para Birimini Seçiniz</option>
							<?php 
							$conn = new PDO(sprintf("mysql:host=%s;dbname=%s;",$config["servername"],$config["db_name"]),$config["username"],$config["password"]);
							$sql = "select * from parabirimleri where userID = {$_SESSION['userID']};";
							$sonuc = $conn->query($sql);
							$say2 = 1;
							foreach ($sonuc as $k2) {				
								if ($gelenveri['parabirimi'] == $say2) {
									printf("<option value='%d' selected>%s</option>",$say2,$k2["parabirimadi"]);
								}
								else{
									printf("<option value='%d'>%s</option>",$say2,$k2["parabirimadi"]);
								}
								$say2++;						
							}
							?>			
						</select>
					</div>
					<input type="hidden" name="id" value="<?php echo "{$gelenveri['id']}"; ?>">
					<button type="submit" class="btn btn-primary">Cari Kaydet</button>
				</form>
			</div>
		</div>

		<?php
	//cari güncelle kodu
	}
}
if(isset($_POST['adisadi'])){
	try{
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			$sql = sprintf("update cariler set adisadi='%s', sirketadi='%s', tel1='%s', tel2='%s', adres='%s', vergidairesi='%s', vergino='%s', grubu='%s', yetkilikisi='%s', fax='%s', cep='%s', ilcekoy='%s', sehir='%s', bolge='%s', ulke='%s', postakodu='%d', webadresi='%s', parabirimi='%s' where id = %d;",
				$_POST['adisadi'],$_POST['sirketadi'],$_POST['tel1'],$_POST['tel2'],$_POST['adresbilgisi'],$_POST['vergidairesi'],$_POST['vergino'],$_POST['grubsecimi'],$_POST['yetkilikisi'],$_POST['fax'],$_POST['cep'],$_POST['ilcekoy'],$_POST['sehir'],$_POST['bolge'],$_POST['ulke'],$_POST['postakodu'],$_POST['webadresi'],$_POST['parabirimi'],$_POST['id']);
			$conn->exec($sql);
			header("Location: mainscreen.php?git=cariduzenle");	

		} catch (PDOException $e) {
			echo "Sorgu hatası: ";
		}
	} 
	catch (PDOException $e) {
		echo "Bağlantı hatası: ";
	}
}
else{

}
?>