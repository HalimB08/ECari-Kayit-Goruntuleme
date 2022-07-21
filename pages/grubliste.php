<?php 
require_once("codes/database/config.php");
if (!isset($_SESSION["username"])) {
  header("Location: ../mainscreen.php");  
}
$conn = new PDO(sprintf("mysql:host=%s;dbname=%s;",$config["servername"],$config["db_name"]),$config["username"],$config["password"]);
$sql = "select * from grublar where userID like {$_SESSION['userID']};";
$sonuc = $conn->query($sql);
?>


<div class="card" style="margin:10px 10px 10px 10px;background-color: #CCFFFF;">
  <div class="card-header">
    Grub Liste
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Grub Adı</th>
          <th scope="col">Düzenle</th>
        </tr>
      </thead>
      <tbody>

        <?php 
        $sayi = 0;
        foreach ($sonuc as $value) {
          $sayi++;
          ?>
          <tr>
            <th scope="row"><?= $sayi ?></th>
            <td><?= $value["grubadi"] ?></td>
            <td>
              <table>
                <tr>
                  <td>
                   <form method="POST" action="mainscreen.php?git=grubguncelle">
                    <input type="hidden" value="<?= $value['id'] ?>" name="gelenID"/>
                    <button type="submit" class="btn btn-success">Düzenle</button>
                  </form>
                </td>
                <td>
                  <form method="POST" action="pages/">  
                    <input type="hidden" value="<?= $value['id'] ?>" name="gelenID"/>          
                    <button type="submit" class="btn btn-danger" disabled>Sil</button>
                  </form>
                </td>
              </tr>        
          </table>                             
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>