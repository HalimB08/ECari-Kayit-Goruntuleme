<?php 
require_once("codes/userscripts/settings.php"); 
if (!isset($_SESSION["username"])) {
	header("Location: login.php");
}
?>
<?php 
include "ischange.php";
if ($degisimvarmi == 1) {
  header("Location: change/change.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-Cari</title>
	<?php require_once("bootstrap/css.php"); ?>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light" style="border-bottom: 1px solid black;background-color: #00FF99;color:white;font-weight: bold;">
		<div class="container-fluid">
			<a class="navbar-brand" href="mainscreen.php">E-Cari</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="mainscreen.php">Anasayfa</a>
					</li>					
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Cari İşlemleri
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="?git=carikaydet">Cari Kaydet</a></li>
							<li><a class="dropdown-item" href="?git=cariduzenle">Cari Düzenle</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Cari Ayarları
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="?git=grubduzenle">Grup Düzenle</a></li>
							<li><a class="dropdown-item" href="?git=parabirimiduzenle">Para Birimi Düzenle</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Detaylı Listeleme
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="?git=cariliste">Cariler</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown" hidden>
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Kullanıcı Ayarları
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="?git=paroladegistir">Parola Değiştir</a></li>
							<li><a class="dropdown-item" href="?git=kullaniciduzenle" hidden>Kullanıcı Düzenle</a></li>
						</ul>
					</li>
				</ul>
				<form class="d-flex" action="codes/userscripts/userclose.php" method="POST" >			     
					<div class="col-auto">
						<input type="text" style="color:black;text-align: right;padding-right: 10px;font-weight: bold;" readonly class="form-control-plaintext" value="<?php echo $_SESSION['username'] ?>">
					</div>
					<button class="btn btn-info" style="font-weight: bold;" type="submit">Çıkış Yap</button>
				</form>
			</div>
		</div>
	</nav>
	<?php 
	include "dangeralert.php";

	if (isset($_GET['git'])) {
		switch($_GET['git']) {
			case 'carikaydet':include "pages/carikaydet.php";
			break;
			case 'caridurum':include "pages/caridurum.php";
			break;
			case 'cariliste':include "pages/cariliste.php";
			break;
			case 'cariduzenle':include "pages/cariduzenle.php";
			break;
			case 'cariguncelle':include "pages/cariguncelle.php";
			break;
			case 'paroladegistir':include "pages/paroladegistir.php";
			break;
			case 'parabirimiduzenle':include "pages/parabirimiduzenle.php";
			break;
			case 'pbirimiliste':include "pages/pbirimiliste.php";
			break;
			case 'grubduzenle':include "pages/grubduzenle.php";
			break;
			case 'grubekle':include "pages/grubekle.php";
			break;
			case 'pbirimiekle':include "pages/pbirimiekle.php";
			break;
			case 'pbirimiguncelle':include "pages/pbirimiguncelle.php";
			break;
			case 'grubliste':include "pages/grubliste.php";
			break;
			case 'grubguncelle':include "pages/grubguncelle.php";
			break;
			default:include "pages/404.php";
			break;
		}
	}
	else{
		include "pages/anasayfa.php";
	}

	?>

	<?php require_once("bootstrap/javascript.php"); ?>
</body>
</html>