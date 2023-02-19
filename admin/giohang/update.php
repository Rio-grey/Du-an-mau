<?php 
  if (is_array($updatebill)) {
    extract($updatebill);
  }
?>
<article>
  <div class="heading">
    <h2>CẬP NHẬT ĐƠN HÀNG</h2>
  </div>
  <form action="index.php?act=editbill" method="POST" enctype="multipart/form-data">
  <div class="row2">
      <div class="col">
        <div class="form-group">
          <label for="">Trạng thái đơn hàng</label>
          <select name="bill_status" class="form-control">
            <?php $ttdh_all = ['0','1', '2', '3'] ?>
            <?php foreach($ttdh_all as $ttdh_one) : ?>
              <option value="<?= $ttdh_one ?>" <?= ($ttdh_one ==  $bill_status) ? 'selected' : '' ?>>
                <?= get_ttdh($ttdh_one) ?>
              </option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
    </div>
    <input type="hidden" name="id_bill" value="<?= $id_bill ?>">
    <button class="btn btn-default" name="btn_update" type="submit">Cập nhật</button>
    <a class="btn btn-default" href="index.php?act=listbill">Danh sách</a>
    <?php
      if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
    ?>
  </form>
</article>