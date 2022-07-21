<?php
if (!isset($_SESSION["username"])) {
	header("Location: mainscreen.php");	
}?>

<div class="card" style="margin:10px 10px 10px 10px;background-color: #CCFFFF;">
	<div class="card-header">
		Kayıt Durumu
	</div>
	<div class="card-body">
		<h2 class="card-title" style="color:red;">Kayıt Başarılı</h2>
		<a href="mainscreen.php?git=carikaydet" class="btn btn-primary">Yeni Cari Ekle</a>
		<a href="mainscreen.php" class="btn btn-primary">AnaSafaya Git</a>
		<a href="mainscreen.php?git=cariliste" class="btn btn-primary">Detaylı Cari Listelemeye Git</a>
	</div>
</div>