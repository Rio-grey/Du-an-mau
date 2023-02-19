      <div class="row mb">
        <div class="boxleft mr">
          <div class="row mb">
            <div class="boxtitle"><strong><?=$tendm?></strong></div>
            <div class="row boxcontent boxsanpham">
              <?php 
                foreach ($dshh as $hh) {
                  extract($hh);
                  $image = $img_path.$hinh;
                  $linkhh="index.php?act=hang_hoa_chi_tiet&ma_hh=".$ma_hh;
                  echo '
                    <div class="boxsp">
                      <div class="row img">
                        <a href="'.$linkhh.'">
                          <img src="'.$image.'" alt="" />
                        </a>
                      </div>
                      <p>$'.$don_gia.'</p>
                      <a href="'.$linkhh.'">'.$ten_hh.'</a>
                    </div>
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