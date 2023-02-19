<div class="row mb">
  <div class="boxleft mr">
    <form action="index.php?act=billconfirm" method="post">
      <div class="row mb">
        <div class="boxtitle">ĐƠN HÀNG BẠN ĐÃ ĐẶT</div>
        <div class="row boxcontent cart">
          <table>
            <tr class="title-table">
              <th>Mã đơn hàng</th>
              <th>Ngày đặt</th>
              <th>Số lượng mặt hàng</th>
              <th>Tổng giá trị đơn hàng</th>
              <th>Tình trạng đơn hàng</th>
            </tr>
            <?php 
              if(is_array($listbill)) {
                foreach ($listbill as $bill) {
                  extract($bill);
                  $ttdh=get_ttdh($bill['bill_status']);
                  $countsp=loadall_cart_count($bill['id_bill']);
                  echo '
                    <tr>
                      <td>DAM-'.$bill['id_bill'].'</td>
                      <td>'.$bill['ngaydathang'].'</td>
                      <td>'.$countsp.'</td>
                      <td>$'.$bill['total'].'</td>
                      <td>'.$ttdh.'</td>
                    </tr>
                  ';
                }
              }
            ?>
            
          </table>
        </div>
      </div>  
    </form>
  </div>
  <div class="boxright">
    <?php include "views/boxright.php" ?>
  </div>
</div>