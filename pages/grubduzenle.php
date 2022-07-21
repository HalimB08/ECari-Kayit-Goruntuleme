<?php
if (!isset($_SESSION["username"])) {
	header("Location: mainscreen.php");	
}?>

<div class="card" style="margin:10px 10px 10px 10px;background-color: #CCFFFF;">
	<div class="card-header">
		Grubları Düzenle
	</div>
	<div class="card-body">
		<a href="mainscreen.php?git=grubekle" class="btn btn-primary">Yeni Grub Ekle</a>
		<a href="mainscreen.php?git=grubliste" class="btn btn-primary">Grub Listele ve Düzenle</a>
	</div>
</div>