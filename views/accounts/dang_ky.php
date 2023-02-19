<div class="row mb">
  <div class="boxleft mr">
    <div class="row mb">
      <div class="boxtitle">Đăng ký thành viên</div>
      <div class="row boxcontent">
        <form action="index.php?act=dangky" method="post" enctype="multipart/form-data">
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
          <button type="submit" class="btn btn-default" name="dangky">Đăng ký</button>
          <button type="reset" class="btn btn-danger">Nhập lại</button>
        </form>
        <?php if(isset($thongbao)&&($thongbao!="")) : ?>
          <h3 style="color: #20E3B2;"><?=$thongbao?></h3>
        <?php endif ?>
      </div>
    </div>
  </div>
  <div class="boxright">
    <?php include "views/boxright.php" ?>
  </div>
</div>