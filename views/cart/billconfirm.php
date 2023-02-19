<div class="row">
  <div class="row mb">
    <div class="boxleft mr">
      <div class="row mb">
        <div class="boxtitle">CÁM ƠN</div>
        <div class="row boxcontent" style="text-align: center;">
          <h2>Cám ơn quý khách đã đặt hàng !</h2>
        </div>
      </div>
      <?php 
        if(isset($bill)&&(is_array($bill))) {
          extract($bill);
        }
      ?>
      <div class="row mb">
        <div class="boxtitle">THÔNG TIN ĐƠN HÀNG</div>
        <div class="row boxcontent" style="text-align: center;">
          <li>Mã đơn hàng: DAM-<?=$bill['id_bill']?></li>
          <li>Ngày đặt hàng: <?=$bill['ngaydathang']?></li>
          <li>Tổng tiền của đơn hàng: $<?=$bill['total']?></li>
        </div>
      </div>
      <div class="row mb">
        <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
        <div class="row boxcontent billform">
          <table>
            <tr>
              <td>Người đặt hàng</td>
              <td><?=$bill['bill_name']?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?=$bill['bill_email']?></td>
            </tr>
            <tr>
              <td>Số điện thoại</td>
              <td><?=$bill['bill_tel']?></td>
            </tr>
            <tr>
              <td>Địa chỉ</td>
              <td><?=$bill['bill_address']?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row mb">
        <div class="boxtitle">PHƯƠNG THỨC THANH TOÁN</div>
        <div class="row boxcontent pttt">
          <table>
            <tr>
              <?php if($bill['bill_pttt']==1) :?>
                <td><?=$bill['bill_pttt']?>. Trả tiền khi nhận hàng</td>
              <?php elseif($bill['bill_pttt']==2) :?>
                <td><?=$bill['bill_pttt']?>. Chuyển khoản ngân hàng</td>  
              <?php elseif($bill['bill_pttt']==3) :?>
                <td><?=$bill['bill_pttt']?>. Thanh toán online</td>  
              <?php endif ?>
            </tr>
          </table>
        </div>
      </div>
      <div class="row mb">
        <div class="boxtitle">CHI TIẾT GIỎ HÀNG</div>
        <div class="row boxcontent cart">
          <table>
            <?php 
              bill_chi_tiet($billct);
            ?>
          </table>
        </div>
      </div>
    </div>
    <div class="boxright">
      <?php include "views/boxright.php" ?>
    </div>
  </div>
</div>