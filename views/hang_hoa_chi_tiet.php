<div class="row mb">
  <div class="boxleft mr">
    <div class="row mb">
      <?php
        extract($hang_hoa_one);
      ?>
      <div class="boxtitle"><?=$ten_hh?></div>
      <div class="row boxcontent">
        <?php 
          $image = $img_path.$hinh;
          echo '
            <div class="row mb hhct">
              <img style="width: 200px;" src="'.$image.'" alt="">
            </div>
            <div class="row btnaddtocart mb">
              <form action="index.php?act=addtocart" method="post" style="text-align: center;">
                <input type="hidden" name="ma_hh" value="'.$ma_hh.'">
                <input type="hidden" name="ten_hh" value="'.$ten_hh.'">
                <input type="hidden" name="hinh" value="'.$hinh.'">
                <input type="hidden" name="don_gia" value="'.$don_gia.'">
                <label for="">Số lượng</label>
                <input style="padding: 5px 8px;border-radius: 5px;border: 2px solid #20e3b2;" type="number" name="soluong" value="1" min="1">
                <button type="submit" name="addtocart" class="addtocart">Thêm vào giỏ hàng</button>
              </form>
            </div>
          ';
          echo '
            <ul class="row mb hhct_ul">
              <li>MÃ HH: '.$ma_hh.'</li>
              <li>TÊN HH: '.$ten_hh.'</li>
              <li>ĐƠN GIÁ: '.$don_gia.'</li>
              <li>GIẢM GIÁ: '.$giam_gia.'</li>
            </ul>
          ';
          echo $mo_ta;
        ?>
      </div>
    </div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#binhluan").load("views/binhluan/binhluanform.php", {ma_hh: <?=$ma_hh?>});
      });
    </script> -->
    <div class="row mb" >
      <iframe src="views/binhluan/binhluanform.php?ma_hh=<?=$ma_hh?>" frameborder="0" width="100%" height="300px"></iframe>
    </div>
    <div class="row mb">
      <div class="boxtitle">HÀNG HÓA CÙNG LOẠI</div>
      <div class="row boxcontent">
        <?php
          foreach ($hh_cungloai as $hh) {
            extract($hh);
            $linkhh="index.php?act=hang_hoa_chi_tiet&ma_hh=".$ma_hh;
            echo '
              <li style="list-style-type: disc;">
                <a href="'.$linkhh.'">'.$ten_hh.'</a>
              </li>
            ';
          }
        ?>
      </div>
    </div>
  </div>
  <div class="boxright">
    <?php include "boxright.php" ?>
  </div>
</div>