<?php 
require_once("codes/database/config.php");
if (!isset($_SESSION["username"])) {
  header("Location: login.php");
}
$conn = new PDO(sprintf("mysql:host=%s;dbname=%s;",$config["servername"],$config["db_name"]),$config["username"],$config["password"]);
if(isset($_POST['sirketadi'])){
  $sql = "select * from cariler where sirketadi like '%{$_POST['sirketadi']}%';";
  $sonuc = $conn->query($sql);
}
else{
  $sql = "select * from cariler where userid = {$_SESSION['userID']};";
  $sonuc = $conn->query($sql);
}

?>

<div class="card" style="margin:10px 10px 10px 10px;background-color: #CCFFFF;">
  <div class="card-header">
    Cari Düzenleme
  </div>
  <div class="card-body" style="margin: 0px 0px 0px 0px;">
    <form class="d-flex" method="POST" style="margin-bottom: 5px; margin-top: 5px;">
      <input class="form-control me-2" type="search" name="sirketadi" value="<?= $_POST['sirketadi'] ?? '' ?>" placeholder="Şirket Adı" aria-label="Search">
      <button class="btn btn-outline-success" style="margin-bottom: 5px;" type="submit">Ara</button>
    </form>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Şirket Adı</th>
          <th scope="col">Yetkili Kişi</th>
          <th scope="col">Telefon 1</th>
          <th scope="col">Telefon 2</th>
          <th scope="col">Grubu</th>
          <th scope="col">İlçe / Köy</th>
          <th scope="col">Şehir</th>
          <th scope="col">Bölge</th>
          <th scope="col">Ülke</th>
          <th scope="col">Web Adresi</th>
          <th scope="col">Düzenle</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $say = 1;
        $grub;
        foreach ($sonuc as $gelenveri) {
          $grub = "Tanımlanmamış";
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
            <td>
            <form method="POST" action="mainscreen.php?git=cariguncelle">
            <input type="hidden" value="%d" name="gelenID"/>
            <button type="submit" class="btn btn-success">Düzenle</button>
            </form>
            <form method="POST" action="pages/carisil.php">  
            <input type="hidden" value="%d" name="gelenID"/>          
            <button type="submit" class="btn btn-danger">Sil</button>
            </form>
            </td>                    
            </tr>
            ',$say,$gelenveri['sirketadi'],$gelenveri['yetkilikisi'],$gelenveri['tel1'],$gelenveri['tel2'],$grub,$gelenveri['ilcekoy'],$gelenveri['sehir'],$gelenveri['bolge'],$gelenveri['ulke'],$gelenveri['webadresi'],$gelenveri['id'],$gelenveri['id']);
          $say++;
        } ?>
      </tbody>
    </table>
  </div>
</div>

