<?php 
require_once("codes/database/config.php");
if (!isset($_SESSION["username"])) {
	header("Location: login.php");
}
$conn = new PDO(sprintf("mysql:host=%s;dbname=%s;",$config["servername"],$config["db_name"]),$config["username"],$config["password"]);

$secilibutton = 0;

if (isset($_POST["tum_btn"])) {
	$secilibutton = 0;	
}
if (isset($_POST["az_btn"])) {
	$secilibutton = 1;	
}
if (isset($_POST["za_btn"])) {
	$secilibutton = 2;	
}
if (isset($_POST["ilk_btn"])) {
	$secilibutton = 3;	
}
if (isset($_POST["son_btn"])) {
	$secilibutton = 4;	
}
if (isset($_POST["yetkilikisi"])) {
	$secilibutton = 5;	
}

if ($secilibutton == 0) {
	$sql = "select * from cariler where userid = {$_SESSION['userID']};";
	$sonuc = $conn->query($sql);
}
else if ($secilibutton == 1) {
	$sql = "select * from cariler where userid = {$_SESSION['userID']} order by sirketadi asc;";
	$sonuc = $conn->query($sql);
}
else if ($secilibutton == 2) {
	$sql = "select * from cariler where userid = {$_SESSION['userID']} order by sirketadi desc;";
	$sonuc = $conn->query($sql);
}
else if ($secilibutton == 3) {
	$sql = "select * from cariler where userid = {$_SESSION['userID']} order by id asc;";
	$sonuc = $conn->query($sql);
}
else if ($secilibutton == 4) {
	$sql = "select * from cariler where userid = {$_SESSION['userID']} order by id desc;";
	$sonuc = $conn->query($sql);
}
else if ($secilibutton == 5) {
	$sql = "select * from cariler where userid = {$_SESSION['userID']} and sirketadi like'%{$_POST['sirketadi']}%' and yetkilikisi like '%{$_POST['yetkilikisi']}%' and tel1 like '%{$_POST['telefon']}%' and grubu like '%{$_POST['grubu']}%' and parabirimi like '%{$_POST['parabirimi']}%' and ulke like '%{$_POST['ulkesi']}%' and sehir like '%{$_POST['sehir']}%' and sehir like '%{$_POST['ilce']}%';";
	$sonuc = $conn->query($sql);
}
?>
<div class="card" style="margin:10px 10px 10px 10px;background-color: #CCFFFF;">
	<div class="card-header">
		Carilerin Detaylı Listesi
	</div>
	<div class="card-body">
		<div style="float:left;margin-top: 10px;">
			<div class="btn-group">
				


				<form method="POST">
					<input type="text" name="tum_btn" value="0" hidden>
					<button type="submit" class="btn btn-primary <?php if ($secilibutton == 0) {	echo 'active';} ?>">Normal Listele</button>
				</form>


				<form method="POST">
					<input type="text" name="az_btn" value="1" hidden>
					<button type="submit"  class="btn btn-primary <?php if ($secilibutton == 1) {	echo 'active';} ?>">A-Z Liste</button>
				</form>



				<form method="POST">
					<input type="text" name="za_btn" value="2" hidden>
					<button type="submit"  class="btn btn-primary <?php if ($secilibutton == 2) {	echo 'active';} ?>">Z-A Liste</button>
				</form>


				<form method="POST">
					<input type="text" name="ilk_btn" value="3" hidden>
					<button type="submit"  class="btn btn-primary <?php if ($secilibutton == 3) {	echo 'active';} ?>">İlk Kayıtlar</button>
				</form>


				<form method="POST">
					<input type="text" name="son_btn" value="4" hidden>
					<button type="submit" href="#" class="btn btn-primary <?php if ($secilibutton == 4) {	echo 'active';} ?>">Son Kayıtlar</button>				
				</form>



				<form class="d-flex" method="POST">
					<input class="form-control me-2" type="text" style="margin-left: 7px;" name="sirketadi" value="<?= $_POST['sirketadi'] ?? '' ?>" placeholder="Şirket Adı">


					<input class="form-control me-2" type="text" name="yetkilikisi" value="<?= $_POST['yetkilikisi'] ?? '' ?>" placeholder="Yetkili Kişi">



					<input class="form-control me-2" type="text" name="telefon" value="<?= $_POST['telefon'] ?? '' ?>" placeholder="Telefon 1-2">


					<input class="form-control me-2" type="text" name="grubu" value="<?= $_POST['grubu'] ?? '' ?>" placeholder="Grubu">


					<input class="form-control me-2" type="text" name="parabirimi" value="<?= $_POST['parabirimi'] ?? '' ?>" placeholder="Para Birimi">


					<input class="form-control me-2" type="text" name="ulkesi" value="<?= $_POST['ulkesi'] ?? '' ?>" placeholder="Ülke">


					<input class="form-control me-2" type="text" name="sehir" value="<?= $_POST['sehir'] ?? '' ?>" placeholder="Şehir">


					<input class="form-control me-2" type="text" name="ilce" value="<?= $_POST['ilce'] ?? '' ?>" placeholder="İlçe">

					<button type="submit" class="btn btn-info">Ara</button>
				</form>
			</div>

			
		</div>

		<table class="table table-bordered table-hover" style="margin-bottom: 0px;margin-top: 80px;">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Şirket Adı</th>
					<th scope="col">Adı Soyadı</th>
					<th scope="col">Telefon 1</th>
					<th scope="col">Telefon 2</th>
					<th scope="col">Adres Bilgisi</th>
					<th scope="col">Vergi Dairesi</th>
					<th scope="col">Vergi Numarası</th>
					<th scope="col">Grubu</th>
					<th scope="col">Yetkili Kişi</th>
					<th scope="col">Fax</th>
					<th scope="col">Cep</th>
					<th scope="col">İlçe / Köy</th>
					<th scope="col">Şehir</th>
					<th scope="col">Bölge</th>
					<th scope="col">Ülke</th>
					<th scope="col">Posta Kodu</th>
					<th scope="col">Web Adresi</th>
					<th scope="col">Para Birimi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$say = 1;
				

				$grub;
				$parabirim;
				foreach ($sonuc as $gelenveri) {	
					$grub = "Tanımlanmamış";
					$parabirim = "Tanımlanmamış";
					//
					$sqlgrub = "select * from grublar where userid = {$_SESSION['userID']};";
					$sonucgrub = $conn->query($sqlgrub);
					$grubsayi= 0;
					foreach ($sonucgrub as $deger) {
						$grubsayi++;
						if ($grubsayi == $gelenveri["grubu"]) {
							$grub = $deger["grubadi"];
						}
					}
				//
					$sqlparabimi = "select * from parabirimleri where userid = {$_SESSION['userID']};";
					$sonucparabirimi = $conn->query($sqlparabimi);
					$parabirimsayi= 0;
					foreach ($sonucparabirimi as $deger) {
						$parabirimsayi++;
						if ($parabirimsayi == $gelenveri["parabirimi"]) {
							$parabirim = $deger["parabirimadi"];
						}
					}
				//




					printf('
						<tr>
						<th scope="row">%d</th>
						<td>%s</td> 
						<td>%s</td>      
						<td>%s</td>      
						<td>%s</td>      
						<td>%s</td>      
						<td>%s</td>      
						<td>%s</td>      
						<td>%s</td>      
						<td>%s</td>      
						<td>%s</td>      
						<td>%s</td>      
						<td>%s</td>      
						<td>%s</td>      
						<td>%s</td>      
						<td>%s</td>      
						<td>%d</td>      
						<td>%s</td>      
						<td>%s</td>                     
						</tr>
						',$say,$gelenveri['sirketadi'],$gelenveri['adisadi'],$gelenveri['tel1'],$gelenveri['tel2'],$gelenveri['adres'],$gelenveri['vergidairesi'],$gelenveri['vergino'],$grub,$gelenveri['yetkilikisi'],$gelenveri['fax'],$gelenveri['cep'],$gelenveri['ilcekoy'],$gelenveri['sehir'],$gelenveri['bolge'],$gelenveri['ulke'],$gelenveri['postakodu'],$gelenveri['webadresi'],$parabirim);
					$say++;
				} ?>
			</tbody>
		</table>
	</div>
</div>

