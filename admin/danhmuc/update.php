<?php 
  if (is_array($updatedanhmuc)) {
    extract($updatedanhmuc);
  }
?>
<article>
  <div class="heading">
    <h2>CẬP NHẬT LOẠI HÀNG</h2>
  </div>
  <form action="index.php?act=editdm" method="POST" enctype="multipart/form-data">
    <div class="row2">
      <div class="col">
        <div class="form-group">
          <label for="">Mã loại</label>
          <input class="form-control" type="text" name="maloai" readonly placeholder="auto number" disabled value="<?= $ma_loai ?>">
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Tên loại</label>
          <input class="form-control" type="text" name="tenloai" placeholder="tên loại hàng" value="<?= $ten_loai ?>" required>
        </div>
      </div>
    </div>
    <input type="hidden" name="ma_loai" value="<?= $ma_loai ?>">
    <button class="btn btn-default" name="btn_update" type="submit">Cập nhật</button>
    <button class="btn btn-danger" type="reset">Nhập lại</button>
    <a class="btn btn-default" href="index.php?act=listdm">Danh sách</a>
    <?php
      if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
    ?>
  </form>
</article>