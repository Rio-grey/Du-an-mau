<div class="row mb">
  <div class="boxtitle">TÀI KHOẢN</div>
  <div class="boxcontent row formtaikhoan">
    <?php if(isset($_SESSION['user'])) : ?>
      <?php 
        extract($_SESSION['user'])
      ?>
      <div class="row mb10">
        <label for="">Xin chào</label>
        <?= $ho_ten ?>
      </div>
      <div class="row mb10">
        <img src="./images/users/<?= $hinh ?>" alt="" width="120">
      </div>
      <div class="row mb10">
        <li><a href="index.php?act=mybill">Đơn hàng của tôi</a></li>
        <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
        <li><a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>
        <?php if($vai_tro==1) : ?>
          <li><a href="admin/index.php">Quản trị website</a></li>
        <?php endif ?>
        <li><a href="index.php?act=thoat">Đăng xuất</a></li>
      </div>
    <?php else : ?>
      <form action="index.php?act=dangnhap" method="post">
        <div class="row mb10">
          <label for="">Tên đăng nhập</label>
          <input type="text" name="makh" />
        </div>
        <div class="row mb10">
          <label for="">Mật khẩu</label>
          <input type="password" name="pass" /><br />
        </div>
        <div class="row mb10">
          <input type="checkbox" /> Ghi nhớ tài khoản ?<br />
        </div>
        <div class="row mb10">
          <input type="submit" name="dangnhap" value="Đăng nhập" />
        </div>
      </form>
      <li><a href="#">Quên mật khẩu</a></li>
      <li><a href="index.php?act=dangky">Đăng ký thành viên</a></li>
    <?php endif ?>
  </div>
</div>
<div class="row mb">
  <div class="boxtitle">DANH MỤC</div>
  <div class="boxcontent2 menudoc">
    <ul>
      <?php
        foreach ($dsdm as $dm) {
          extract($dm);
          $linkdm = "index.php?act=hang_hoa&ma_loai=".$ma_loai;
          echo '
            <li><a href="'.$linkdm.'">'.$ten_loai.'</a></li>
          ';
        }
      ?>
    </ul>
  </div>
  <div class="boxfooter searchbox">
    <form action="index.php?act=hang_hoa" method="post">
      <input
        type="text"
        name="search"
        placeholder="Từ khóa tìm kiếm"
        style="width: 86%;"
      />
      <button type="submit" name="timkiem" style="padding: 2.5px 5px; border: 1px solid #ccc; border-radius: 3px; cursor: pointer;">
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>
    </form>
  </div>
</div>
<div class="row">
  <div class="boxtitle">TOP 10 YÊU THÍCH</div>
  <div class="row boxcontent">
    <?php
      foreach ($dstop10 as $hh) {
        extract($hh);
        $linkhh="index.php?act=hang_hoa_chi_tiet&ma_hh=".$ma_hh;
        $image = $img_path.$hinh;
        echo '
          <div class="row mb10 top10">
            <img src="'.$image.'" alt="" />
            <a href="'.$linkhh.'">'.$ten_hh.'</a>
          </div>
        ';
      }
    ?>
  </div>
</div>