
<?php 
include "ischange.php";
if ($degisimvarmi == 1) {
  header("Location: change/change.php");
}
require_once("codes/userscripts/settings.php");
if (isset($_SESSION["username"])) {
    header("Location: mainscreen.php"); 
}
?>

<?php 
if (isset($_POST['name'])) {
  if ($_POST["password"] == $_POST["passwordagain"]) {
    if (!$_POST["password"] == null || !$_POST["password"] == "") {
      try {
        require_once("codes/database/config.php");
        $conn = new PDO(sprintf("mysql:host=%s;dbname=%s;",$config["servername"],$config["db_name"]),$config["username"],$config["password"]);
        $sql = sprintf("insert into users(name, surname, username, mail, authority, password, active) values('%s','%s','%s','%s',%d,'%s',%d);",$_POST['name'],$_POST['surname'],$_POST['username'],$_POST['mail'],0,$_POST['password'],1);
        $conn->exec($sql);
        header("Location: login.php");
    } catch (Exception $e) {
        $saveError = "error";
    }
}
else{
  $passnullError = "error";
}
}
else{
    $passError = "error";
}
}
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
    <title>E-Cari - Kullanıcı Kaydı</title>
</head>
<body>
    <div id="logreg-forms" style="margin-top: 15px;padding-top: 5px;margin-bottom: 30px;">
        <form class="form-signin" method="POST">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> E Cari<br/><hr>Kayıt Ol</h1>
            <?php   include "dangeralert.php"; ?>
            <div class="social-login">
                <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Facebook ile Kayıt Ol</span> </button>
                <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Google+ ile Kayıt Ol</span> </button>
            </div>
            <p style="text-align:center"> Ve Ya  </p>
            <p style="color:red;" <?= isset($passError) ?  '': 'hidden';?>>Kayıt Gerçekleşemedi! Şifreniz Uyuşmuyor!</p>
            <p style="color:red;" <?= isset($saveError) ?  '': 'hidden';?>>Kayıt Gerçekleşemedi! Bir hata var!</p>
            <p style="color:red;" <?= isset($passnullError) ?  '': 'hidden';?>>Kayıt Gerçekleşemedi! Şifre kısmı boş geçilemez!</p>
            <input type="text" id="inputEmail" name="username" autocomplete="off" value="<?= $_POST['username'] ?? ''?>" class="form-control" placeholder="Kullanıcı Adı" autocomplete="off" required="" autofocus="">
            <input type="text" id="inputEmail" name="name" autocomplete="off" value="<?= $_POST['name'] ?? ''?>" class="form-control" placeholder="Adınız" required="" autofocus="">
            <input type="text" id="inputEmail" name="surname" autocomplete="off" value="<?= $_POST['surname'] ?? ''?>" class="form-control" placeholder="Soyadınız" required="" autofocus="">
            <input type="mail" id="inputEmail" name="mail" autocomplete="off" class="form-control" value="<?= $_POST['mail'] ?? ''?>" placeholder="Mailiniz" required="" autofocus="">
            <input type="password" id="inputEmail" name="password" class="form-control" placeholder="Şifre" required="" autofocus="">
            <input type="password" id="inputEmail" name="passwordagain" class="form-control" placeholder="Şifre Tekrar" required="" autofocus="">

            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Kayıt Ol</button>

            <a href="#" id="forgot_pswd">Şifreni mi unuttun?</a>
            <hr>
            <!-- <p>Don't have an account!</p>  -->
            <button class="btn btn-primary btn-block" onclick="window.location.href='login.php'" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Giriş Yap</button>
        </form>

        <br>

    </div>
    <p style="text-align:center;">
        <a href="#" style="color:black;">By GurcinaSoft - E Cari v0.2.1</a>
    </p>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="change/js/loginv2.js"></script>
</body>
</html>

