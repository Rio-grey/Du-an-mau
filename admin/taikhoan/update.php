<?php 
  if (is_array($updatetaikhoan)) {
    extract($updatetaikhoan);
  }
?>
<article>
  <div class="heading">
    <h2>CẬP NHẬT TÀI KHOẢN</h2>
  </div>
  <form action="index.php?act=editkh" method="POST" enctype="multipart/form-data">
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
    <br>
    <div class="col2">
      <div class="form-group">
        <label for="" >Hình đại diện</label>
        <input class="form-control" type="file" name="hinh">
        <!-- Lưu lại tên ảnh cũ -->
        <input type="hidden" name="hinh" value="<?= $hinh ?>">
        <img src="../images/users/<?= $hinh ?>" width="120" alt="">
      </div>
    </div>
    <br>
    <div class="col2">
      <div class="form-group">
        <label for="" >Vai trò</label>
        <!-- <input class="form-control" type="number" min="0" max="1" name="vaitro" value="<?=$vai_tro?>"> -->
        <select name="vai_tro" class="form-control">
          <?php $vt = ['0','1'] ?>
          <?php foreach($vt as $vt_kh) : ?>
            <option value="<?= $vt_kh ?>" <?= ($vt_kh == $vai_tro) ? 'selected' : '' ?>>
              <?= checkvaitro($vt_kh) ?>
            </option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <br>
    <input type="hidden" name="id_kh" value="<?=$id_kh?>">
    <button class="btn btn-default" name="btn_update" type="submit">Cập nhật</button>
    <button class="btn btn-danger" type="reset">Nhập lại</button>
    <a class="btn btn-default" href="index.php?act=listkh">Danh sách</a>
    <?php
      if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
    ?>
  </form>
</article>