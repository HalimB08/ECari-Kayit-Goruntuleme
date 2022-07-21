
<?php 
include "ischange.php";
if ($degisimvarmi == 1) {
  header("Location: change/change.php");
}
?>
<?php 
require_once("codes/userscripts/logincode.php");
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="change/css/loginv2.css">
    <title>E-Cari - Kullanıcı Girişi</title>
</head>
<body>
    <div id="logreg-forms">
        <form class="form-signin" method="POST">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> E Cari<br/><hr>Giriş Yap</h1>
            <?php   include "dangeralert.php"; ?>
            <div class="social-login">
                <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Facebook ile Giriş Yap</span> </button>
                <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Google+ ile Giriş Yap</span> </button>
            </div>
            <p style="text-align:center"> Ve Ya  </p>
            <input type="text" id="inputEmail" name="username" autocomplete="off" class="form-control" placeholder="Kullanıcı Adı" required="" autofocus="">
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Şifreniz" required="">
            <?php 
                if($errorhata==1){
                    echo "<br><p style='color:red;'>Kullanıcı adı veya şifre yanlış girildi.</p>";
                }
            ?>
            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Giriş Yap</button>

            <a href="#" id="forgot_pswd">Şifreni mi unuttun?</a>
            <hr>
            <!-- <p>Don't have an account!</p>  -->
            <button class="btn btn-primary btn-block" onclick="window.location.href='register.php'" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Yeni Hesap Oluştur</button>
        </form>

        <br>

    </div>
    <p style="text-align:center; margin-top: 5px;">
        <a href="#" style="color:black">By GurcinaSoft - E Cari v0.2.1</a>
    </p>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="change/js/loginv2.js"></script>
</body>
</html>

