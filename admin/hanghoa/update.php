<?php 
  if (is_array($updatehanghoa)) {
    extract($updatehanghoa);
  }
?>
<article>
  <div class="heading">
    <h2>CẬP NHẬT HÀNG HÓA</h2>
  </div>
  <form action="index.php?act=edithh" method="POST" enctype="multipart/form-data">
  <div class="row2">
      <div class="col">
        <div class="form-group">
          <label for="">Mã hàng hóa</label>
          <input class="form-control" type="text" name="mahh" value="<?= $ma_hh ?>" readonly placeholder="auto number" disabled>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Tên hàng hóa</label>
          <input class="form-control" type="text" name="tenhh" value="<?= $ten_hh ?>" required>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Đơn giá</label>
          <input class="form-control" type="text" name="dongia" value="<?= $don_gia ?>" required>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Giảm giá</label>
          <input class="form-control" type="text" name="giamgia" value="<?= $giam_gia ?>" required>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Hình ảnh</label>
          <input class="form-control" type="file" name="hinh">
          <!-- Lưu lại tên ảnh cũ -->
          <input type="hidden" name="hinh" value="<?= $hinh ?>">
          <img src="../images/products/<?= $hinh ?>" width="120" alt="">
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Mô tả</label>
          <textarea name="mota" class="full" cols="30" rows="10" required><?= $mo_ta ?></textarea>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Danh mục</label>
          <select name="ma_loai" class="form-control">
            <?php foreach($listdanhmuc as $danhmuc) : ?>
              <option value="<?= $danhmuc['ma_loai'] ?>" <?= ($danhmuc['ma_loai'] == $ma_loai) ? 'selected' : '' ?>>
                <?= $danhmuc['ten_loai'] ?>
              </option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Đặc biệt</label>
          <select name="dacbiet" class="form-control">
          <?php $db = ['0','1'] ?>
          <?php foreach($db as $db_hh) : ?>
            <option value="<?= $db_hh ?>" <?= ($db_hh == $dac_biet) ? 'selected' : '' ?>>
              <?= checkdacbiet($db_hh) ?>
            </option>
          <?php endforeach ?>
          </select>
        </div>
      </div>
    </div>
    <input type="hidden" name="ma_hh" value="<?= $ma_hh ?>">
    <button class="btn btn-default" name="btn_update" type="submit">Cập nhật</button>
    <button class="btn btn-danger" type="reset">Nhập lại</button>
    <a class="btn btn-default" href="index.php?act=listhh">Danh sách</a>
    <?php
      if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
    ?>
  </form>
</article>