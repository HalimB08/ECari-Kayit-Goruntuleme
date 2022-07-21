<?php 
include "../ischange.php";
if ($degisimvarmi != 1) {
	header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Çok Yakında</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/countdowntime/flipclock.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="bg-img1 size1 overlay1 p-t-24" style="background-image: url('images/bg01.jpg');">
		<div class="flex-w flex-sb-m p-l-80 p-r-74 p-b-175 respon5">
			<div class="wrappic1 m-r-30 m-t-10 m-b-10">
				<a href="#"><img src="images/icons/logo.png" alt="LOGO"></a>
			</div>

			<div class="flex-w m-t-10 m-b-10">
				<a href="#" class="size3 flex-c-m how-social trans-04 m-r-6">
					<i class="fa fa-facebook"></i>
				</a>

				<a href="#" class="size3 flex-c-m how-social trans-04 m-r-6">
					<i class="fa fa-twitter"></i>
				</a>

				<a href="#" class="size3 flex-c-m how-social trans-04 m-r-6">
					<i class="fa fa-youtube-play"></i>
				</a>
			</div>
		</div>

		<div class="flex-w flex-sa p-r-200 respon1">
			<div class="p-t-34 p-b-60 respon3">
				<p class="l1-txt1 p-b-10 respon2">
					Web Sitemiz
				</p>

				<h3 class="l1-txt2 p-b-45 respon2 respon4">
					Güncelleniyor/Bakım Yapılıyor..
				</h3>

				<div class="cd100"></div>

			</div>
			<!--
			<div class="bg0 wsize1 bor1 p-l-45 p-r-45 p-t-50 p-b-18 p-lr-15-sm">
				<h3 class="l1-txt3 txt-center p-b-43">
					Haberler
				</h3>

				<form class="w-full validate-form">

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Name is required">
						<input class="input100 placeholder0 s1-txt1" type="text" name="name" placeholder="İsim">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-20" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100 placeholder0 s1-txt1" type="text" name="email" placeholder="Eposta">
						<span class="focus-input100"></span>
					</div>
					
					<button class="flex-c-m size2 s1-txt2 how-btn1 trans-04">
						Abone Ol
					</button>
				</form>

				<p class="s1-txt3 txt-center p-l-15 p-r-15 p-t-25">
					Ve merak etmeyin, biz de spam'den nefret ediyoruz! İstediğiniz zaman abonelikten çıkabilirsiniz.
				</p>
			</div>
		-->
	</div>
</div>





<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/flipclock.min.js"></script>
<script src="vendor/countdowntime/moment.min.js"></script>
<script src="vendor/countdowntime/moment-timezone.min.js"></script>
<script src="vendor/countdowntime/moment-timezone-with-data.min.js"></script>
<script src="vendor/countdowntime/countdowntime.js"></script>


<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
	$('.js-tilt').tilt({
		scale: 1.1
	})
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>