<article>
  <div class="heading">
    <h2>THÊM MỚI LOẠI HÀNG</h2>
  </div>
  <form action="index.php?act=adddm" method="POST" enctype="multipart/form-data">
    <div class="row2">
      <div class="col">
        <div class="form-group">
          <label for="">Mã loại</label>
          <input class="form-control" type="text" name="maloai" readonly placeholder="auto number" disabled>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Tên loại</label>
          <input class="form-control" type="text" name="tenloai" placeholder="tên loại hàng" required>
        </div>
      </div>
    </div>
    <button class="btn btn-default" name="btn_insert" type="submit">Thêm</button>
    <button class="btn btn-default" type="reset">Nhập lại</button>
    <a class="btn btn-default" href="index.php?act=listdm">Danh sách</a>
    <?php
      if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
    ?>
  </form>
</article>