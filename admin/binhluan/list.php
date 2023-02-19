<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tổng hợp bình luận</title>
  <style>
    table {
      text-align: center;
    }
  </style>
  <link rel="stylesheet" href="../css/style.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"> -->
</head>
<body>
  <form action="index.php?act=delete_bl" method="post">
    <div class="headline">
      <h2 style="text-align: center; font-size: 30px;">Tổng hợp bình luận</h2>
    </div>
    <br>
    <table class="table">
      <thead>
        <tr>
          <th></th>
          <th>Hàng hóa</th>
          <th>Người bình luận</th>
          <th>Nội dung</th>
          <th>Ngày bình luận</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        
          <?php foreach($listbinhluan as $binhluan) : ?>
            <tr>
              <td><input type="checkbox" name="check[]" value="<?= $binhluan['ma_bl'] ?>"></td>
              <td><?= $binhluan['ten_hh'] ?></td>
              <td><?= $binhluan['ma_kh'] ?></td>
              <td><?= $binhluan['noi_dung'] ?></td>
              <td><?= $binhluan['ngay_bl'] ?></td>
              <td>
                <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" href="index.php?act=deletebl&ma_bl=<?= $binhluan['ma_bl'] ?>">Xóa</a>
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