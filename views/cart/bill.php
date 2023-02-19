<div class="row mb">
  <div class="boxleft mr">
    <form action="index.php?act=billconfirm" method="post">
      <div class="row mb">
        <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
        <div class="row boxcontent billform">
          <table>
            <?php 
              if(isset($_SESSION['user'])) {
                $ho_ten=$_SESSION['user']['ho_ten'];
                $email=$_SESSION['user']['email'];
              } else {
                $ho_ten="";
                $email="";
              }
            ?>
            <tr>
              <td>Người đặt hàng</td>
              <td><input type="text" name="ho_ten" value="<?=$ho_ten?>"></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><input type="text" name="email" value="<?=$email?>"></td>
            </tr>
            <tr>
              <td>Số điện thoại</td>
              <td><input type="text" name="phone" required></td>
            </tr>
            <tr>
              <td>Địa chỉ</td>
              <td><input type="text" name="address" required></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row mb">
        <div class="boxtitle">PHƯƠNG THỨC THANH TOÁN</div>
        <div class="row boxcontent pttt">
          <table>
            <tr>
              <td><input type="radio" value="1" name="pttt" checked> Trả tiền khi nhận hàng</td>
              <td><input type="radio" value="2" name="pttt"> Chuyển khoản ngân hàng</td>
              <td><input type="radio" value="3" name="pttt"> Thanh toán online</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row mb">
        <div class="boxtitle">THÔNG TIN GIỎ HÀNG</div>
        <div class="row boxcontent cart">
          <table>
            <?php viewcart(0); ?>
          </table>
        </div>
      </div>
      <div class="row mb bill">
        <a href="index.php?act=billconfirm"><button name="dongydathang" type="submit">Đồng ý đặt hàng</button></a>
      </div>
    </form>
  </div>
  <div class="boxright">
    <?php include "views/boxright.php" ?>
  </div>
</div>