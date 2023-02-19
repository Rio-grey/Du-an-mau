<div class="row mb">
  <div class="boxleft mr">
    <div class="row mb">
      <div class="boxtitle">Cập nhật tài khoản</div>
      <div class="row boxcontent">
        <?php 
          if((isset($_SESSION['user']))&&(is_array($_SESSION['user']))) {
            extract($_SESSION['user']);
          }
        ?>
        <form action="index.php?act=edit_taikhoan" method="post" enctype="multipart/form-data">
          <div class="col2">
            <div class="form-group">
              <label for="" >Tên đăng nhập</label>
              <input class="form-control" type="text" name="makh" value="<?=$ma_kh?>" required>
            </div>
          </div>
          <br>
          <div class="col2">
            <div class="form-group">
              <label for="" >Họ và tên</label>
              <input class="form-control" type="text" name="hoten" value="<?=$ho_ten?>" required>
            </div>
          </div>
          <br>
          <div class="col2">
            <div class="form-group">
              <label for="" >Email</label>
              <input class="form-control" type="email" name="email" value="<?=$email?>" required>
            </div>
          </div>
          <br>
          <div class="col2">
            <div class="form-group">
              <label for="" >Mật khẩu</label>
              <input class="form-control" type="password" name="pass" value="<?=$mat_khau?>" required>
            </div>
          </div>
          <div class="col2">
            <div class="form-group">
              <label for="" >Hình đại diện</label>
              <input class="form-control" type="file" name="hinh">
              <!-- Lưu lại tên ảnh cũ -->
              <input type="hidden" name="hinh" value="<?= $hinh ?>">
              <img src="./images/users/<?= $hinh ?>" width="120" alt="">
            </div>
          </div>
          <br>
          <input type="hidden" name="idkh" value="<?=$id_kh?>">
          <button type="submit" class="btn btn-default" name="capnhat">Cập nhật</button>
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