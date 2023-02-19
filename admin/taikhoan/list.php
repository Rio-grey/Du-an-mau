<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh sách tài khoản</title>
  <style>
    table {
      text-align: center;
    }
  </style>
  <link rel="stylesheet" href="../css/style.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"> -->
</head>
<body>
    <div class="headline">
      <h2 style="text-align: center; font-size: 30px;">Danh sách tài khoản</h2>
    </div>
    <br>
    <form action="index.php?act=delete_kh" method="post">
      <table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Tên đăng nhập</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Hình ảnh</th>
            <th>Vai trò</th>
            <th><a href="index.php?act=addkh" class="btn btn-default">Thêm tài khoản</a></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($listtaikhoan as $taikhoan) : ?>
            <tr>
              <td><input type="checkbox" name="check[]" value="<?= $taikhoan['id_kh'] ?>" id=""></td>
              <td><?= $taikhoan['ma_kh'] ?></td>
              <td><?= $taikhoan['ho_ten'] ?></td>
              <td><?= $taikhoan['email'] ?></td>
              <td><?= $taikhoan['mat_khau'] ?></td>
              <td>
                <img src="../images/users/<?= $taikhoan['hinh'] ?>" alt="" width="120">
              </td>
              <td><?= $vai_tro = checkvaitro($taikhoan['vai_tro']) ?></td>
              <td>
                <a href="index.php?act=updatekh&id_kh=<?= $taikhoan['id_kh'] ?>" class="btn btn-default">Sửa</a>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" href="index.php?act=deletekh&id_kh=<?= $taikhoan['id_kh'] ?>" class="btn btn-danger">Xóa</a>
              </td>
            </tr>
          <?php endforeach ?>  
        </tbody>
      </table>
      <div>
        <button class="btn btn-default" id="check-all" type="button">Chọn tất cả</button>
        <button class="btn btn-default" id="clear-all" type="button">Bỏ chọn tất cả</button>
        <button class="btn btn-danger" type="submit">Xóa các mục đã chọn</button>
      </div>
    </form>
    <script>
      document.getElementById("check-all").onclick = function () {
      // Lấy danh sách checkbox
      var checkboxes = document.getElementsByName("check[]");

      // Lặp và thiết lập checked
      for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = true;
      }
    };

    // Chức năng bỏ chọn hết
    document.getElementById("clear-all").onclick = function () {
      // Lấy danh sách checkbox
      var checkboxes = document.getElementsByName("check[]");

      // Lặp và thiết lập Uncheck
      for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = false;
      }
    };
    </script>
</body>
</html>