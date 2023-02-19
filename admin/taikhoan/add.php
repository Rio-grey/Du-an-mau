<article>
  <div class="heading">
    <h2>THÊM MỚI TÀI KHOẢN</h2>
  </div>
  <form action="index.php?act=addkh" method="POST" enctype="multipart/form-data">
    <div class="col2">
      <div class="form-group">
        <label for="" >Tên đăng nhập</label>
        <input class="form-control" type="text" name="makh" required>
      </div>
    </div>
    <br>
    <div class="col2">
      <div class="form-group">
        <label for="" >Họ và tên</label>
        <input class="form-control" type="text" name="hoten" required>
      </div>
    </div>
    <br>
    <div class="col2">
      <div class="form-group">
        <label for="" >Email</label>
        <input class="form-control" type="email" name="email" required>
      </div>
    </div>
    <br>
    <div class="col2">
      <div class="form-group">
        <label for="" >Mật khẩu</label>
        <input class="form-control" type="password" name="pass" required>
      </div>
    </div>
    <br>
    <div class="col2">
      <div class="form-group">
        <label for="" >Hình đại diện</label>
        <input class="form-control" type="file" name="hinh" required>
      </div>
    </div>
    <br>
    <div class="col2">
      <div class="form-group">
        <label for="" >Vai trò</label>
        <!-- <input class="form-control" type="number" min="0" max="1" name="vaitro"> -->
        <select name="vaitro" id="" class="form-control">
          <option value="0">Khách hàng</option>
          <option value="1">Người quản trị</option>
        </select>
      </div>
    </div>
    <br>
    <button class="btn btn-default" name="btn_insert" type="submit">Thêm</button>
    <button class="btn btn-danger" type="reset">Nhập lại</button>
    <a class="btn btn-default" href="index.php?act=listkh">Danh sách</a>
    <?php
      if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
    ?>
  </form>
</article>