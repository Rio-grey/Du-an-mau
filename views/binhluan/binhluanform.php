<?php
  session_start();
  include "../../models/PDO.php";
  include "../../models/binhluan.php";
  $ma_hh=$_REQUEST['ma_hh'];
  $listbinhluan = show_binhluan($ma_hh);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bình luận</title>
  <style>
    .table {
      padding: 8px;
    }
  </style>
  <link rel="stylesheet" href="../../css/app.css">
</head>
<body>
  <div class="row mb">
    <div class="boxtitle">BÌNH LUẬN</div>
    <div class="boxcontent2 menudoc binhluan">
      <?php
        foreach ($listbinhluan as $binhluan) {
          extract($binhluan);
          echo '
            <table class="table">
              <tbody>
                <tr>
                  <td style="width: 80%;">'.$noi_dung.'</td>
                  <td style="width: 10%;">'.$ma_kh.'</td>
                  <td>'.$ngay_bl.'</td>
                </tr>
              </tbody>
            </table>
          ';
        }
      ?>
    </div>
    <td ></td>
    <div class="boxfooter searchbox">
      <?php if(isset($_SESSION['user'])) : ?>
        <form action="binhluanform.php" method="post">
          <input type="hidden" name="ma_hh" value="<?=$ma_hh?>">
          <input
            type="text"
            name="noidung"
            placeholder="viết bình luận"
            style="width: 84%;"
            required
          />
          <button type="submit" name="guibinhluan" style="padding: 2.5px 5px; border: 1px solid #ccc; border-radius: 3px; cursor: pointer;">
            Gửi bình luận
          </button>
        </form>
      <?php else : ?>
        <h2 style="color: red;">Bạn cần đăng nhập để bình luận</h2>
      <?php endif ?>  
    </div>
    <?php 
      if(isset($_POST['guibinhluan'])) {
        $noi_dung=$_POST['noidung'];
        $ma_hh=$_POST['ma_hh'];
        $id_kh=$_SESSION['user']['id_kh'];
        $ngay_bl=date('d/m/Y');
        insert_binhluan($id_kh, $ma_hh, $noi_dung, $ngay_bl);
        header("Location: ".$_SERVER['HTTP_REFERER']);
      }
    ?>
  </div>
</body>
</html>
