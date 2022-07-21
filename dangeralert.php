

<?php
      $guncelleme = 0;
      $baslangictarih = "03.30 Saati 30.05.2022 tarihi";
      $sontarih = "04.00 Saati 30.05.2022 tarihi";
      if($guncelleme == 1){
?>
<div class="alert alert-danger" role="alert" style="margin:10px 0px 10px 0px">
      Sitemiz bakıma/güncellemeye alınacaktır. <?= $baslangictarih ?> ile <?= $sontarih ?> arası sitemize erişim sağlayamıyacaksınız. Lütfen gerekli önlemlerinizi alınız.
      <br><br>
      v0.2 ile gelen hataları yok etme çalışması yapılacaktır.
</div>

<?php } ?>