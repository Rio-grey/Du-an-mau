      <div class="row mb">
        <div class="boxleft mr">
          <div class="row">
            <div class="banner ">
              <!-- Slideshow container -->
              <div class="slideshow-container">
                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                  <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" style="width:100%">
                </div>
                <div class="mySlides fade">
                  <img src="https://images.unsplash.com/photo-1573320286044-b43a4168fb40?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" style="width:100%">
                </div>
                <div class="mySlides fade">
                  <img src="https://images.unsplash.com/photo-1510127034890-ba27508e9f1c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" style="width:100%">
                </div>
                <div class="mySlides fade">
                  <img src="https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" style="width:100%">
                </div>
                <div class="mySlides fade">
                  <img src="https://images.unsplash.com/photo-1588058365548-9efe5acb8077?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" style="width:100%">
                </div>
                <div class="mySlides fade">
                  <img src="https://images.unsplash.com/photo-1521369909029-2afed882baee?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" style="width:100%">
                </div>
                <div class="mySlides fade">
                  <img src="https://images.unsplash.com/photo-1511370235399-1802cae1d32f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1155&q=80" style="width:100%">
                </div>
              </div>
              <br>
            </div>
          </div>
          <div class="row boxsanpham">
            <?php
            foreach ($hhnew as $hh) {
              extract($hh);
              $image = $img_path . $hinh;
              $linkhh = "index.php?act=hang_hoa_chi_tiet&ma_hh=" . $ma_hh;
              $db = checkdacbiet($dac_biet);
              echo '
                  <div class="boxsp">
                    <div class="row img">
                      <a href="' . $linkhh . '">
                        <img src="' . $image . '" alt="" />
                      </a>
                    </div>
                    <p>$' . $don_gia . '</p>
                    <a style="display: block;" href="' . $linkhh . '">' . $ten_hh . '</a>
                    <a href="' . $linkhh . '"><button type="submit" style="margin-left: -0px;" class="addtocart">Mua ngay</button></a>
                    <span style="color: red; margin-left: 55px;">' . $db . '</span>
                  </div>
                ';
            }
            ?>
          </div>
        </div>

        <div class="boxright">
          <?php include "boxright.php" ?>
        </div>
      </div>

      <!-- <div class="row btnaddtocart">
        <form action="index.php?act=addtocart" method="post">
          <input type="hidden" name="ma_hh" value="'.$ma_hh.'">
          <input type="hidden" name="ten_hh" value="'.$ten_hh.'">
          <input type="hidden" name="hinh" value="'.$hinh.'">
          <input type="hidden" name="don_gia" value="'.$don_gia.'">
          <button type="submit" name="addtocart" class="addtocart">Thêm vào giỏ hàng</button>
        </form>
      </div> -->