<div class="row mb">
  <div class="boxleft mr">
    <div class="row mb">
      <div class="boxtitle">Quên mật khẩu</div>
      <div class="row boxcontent">
        <form action="index.php?act=quenmk" method="post" enctype="multipart/form-data">
          <div class="col2">
            <div class="form-group">
              <label for="" >Email</label>
              <input class="form-control" type="email" name="email" required>
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-default" name="guiemail">Gửi lại mật khẩu</button>
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