<?php
if (!isset($_SESSION["username"])) {
	header("Location: mainscreen.php");	
}?>

<div class="card" style="margin:10px 10px 10px 10px;background-color: #CCFFFF;">
	<div class="card-header">
		Para Birimi Düzenle
	</div>
	<div class="card-body">
		<a href="mainscreen.php?git=pbirimiekle" class="btn btn-primary">Yeni Para Birimi Ekle</a>
		<a href="mainscreen.php?git=pbirimiliste" class="btn btn-primary">Para Birimi Listele ve Düzenle</a>
	</div>
</div>