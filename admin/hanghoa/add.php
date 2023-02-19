<article>
  <div class="heading">
    <h2>THÊM MỚI HÀNG HÓA</h2>
  </div>
  <form action="index.php?act=addhh" method="POST" enctype="multipart/form-data">
    <div class="row2">
      <div class="col">
        <div class="form-group">
          <label for="">Mã hàng hóa</label>
          <input class="form-control" type="text" name="mahh" readonly placeholder="auto number" disabled>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Tên hàng hóa</label>
          <input class="form-control" type="text" name="tenhh" required>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Đơn giá</label>
          <input class="form-control" type="text" name="dongia" required>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Giảm giá</label>
          <input class="form-control" type="text" name="giamgia" required>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Hình ảnh</label>
          <input class="form-control" type="file" name="hinh" required>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Mô tả</label>
          <textarea name="mota" class="full" cols="30" rows="10" required></textarea>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Danh mục</label>
          <select name="ma_loai" class="form-control">
            <?php foreach($listdanhmuc as $danhmuc) : ?>
              <option value="<?= $danhmuc['ma_loai'] ?>"><?= $danhmuc['ten_loai'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Hàng đặc biệt</label>
          <select name="dacbiet" class="form-control">
            <option value="0">No limited</option>
            <option value="1">Linited</option>
          </select>
        </div>
      </div>
    </div>
    <button class="btn btn-default" name="btn_insert" type="submit">Thêm</button>
    <button class="btn btn-default" type="reset">Nhập lại</button>
    <a class="btn btn-default" href="index.php?act=listhh">Danh sách</a>
    <?php
      if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
    ?>
  </form>
</article>