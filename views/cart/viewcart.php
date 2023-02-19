<div class="row mb">
  <div class="boxleft mr">
    <div class="row mb">
      <div class="boxtitle">GIỎ HÀNG</div>
      <div class="row boxcontent cart">
        <table>
          <?php 
            viewcart(1);
          ?>
        </table>
      </div>
    </div>
    <div class="row mb bill">
      <?php if((isset($_SESSION['user']))) : ?>
        <a href="index.php?act=bill"><button type="submit">Tiếp tục đặt hàng</button></a>
      <?php else : ?>
        <h2 style="color: red; margin-bottom: 10px;">Bạn cần đăng nhập để tiếp tục đặt hàng</h2>
      <?php endif ?>  
      <a href="index.php?act=deletecart"><button>Xóa giỏ hàng</button></a>
    </div>
  </div>
  <div class="boxright">
    <?php include "views/boxright.php" ?>
  </div>
</div>