<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh sách hàng hóa</title>
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
      <h2 style="text-align: center; font-size: 30px;">Danh sách hàng hóa</h2>
    </div>
    <br>
    <form action="index.php?act=listhh" method="POST">
      <div class="form-group">
        <label>Lọc theo danh mục</label>
        <input type="hidden" name="search">
        <select class="form-control" name="ma_loai">
          <option value="0">Tất cả</option>
          <?php foreach($listdanhmuc as $danhmuc) : ?>
            <option value="<?= $danhmuc['ma_loai'] ?>"><?= $danhmuc['ten_loai'] ?></option>
          <?php endforeach ?>
        </select>
        <button type="submit" name="filter" class="btn btn-default" style="border-color: #000; margin-left: 0;">Lọc</button>
      </div>
      <br>
    </form>
    <form action="index.php?act=delete_hh" method="post">
      <table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Mã hàng hóa</th>
            <th>Tên hàng hóa</th>
            <th>Đơn giá</th>
            <th>Giảm giá</th>
            <th>Hình ảnh</th>
            <th>Đặc biệt</th>
            <th>Số lượt xem</th>
            <th>Ngày nhập</th>
            <th>Mô tả</th>
            <th><a href="index.php?act=addhh" class="btn btn-default">Thêm hàng hóa</a></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($listhanghoa as $hanghoa) : ?>
            <tr>
              <td><input type="checkbox" name="check[]" value="<?= $hanghoa['ma_hh'] ?>" id=""></td>
              <td><?= $hanghoa['ma_hh'] ?></td>
              <td><?= $hanghoa['ten_hh'] ?></td>
              <td><?= $hanghoa['don_gia'] ?></td>
              <td><?= $hanghoa['giam_gia'] ?></td>
              <td>
                <img src="../images/products/<?= $hanghoa['hinh'] ?>" alt="" width="120">
              </td>
              <td><?= $dac_biet = checkdacbiet($hanghoa['dac_biet']) ?></td>
              <td><?= $hanghoa['so_luot_xem'] ?></td>
              <td><?= $hanghoa['ngay_nhap'] ?></td>
              <td><span class="hide"><?= $hanghoa['mo_ta'] ?></span></td>
              <td>
                <a href="index.php?act=updatehh&ma_hh=<?= $hanghoa['ma_hh'] ?>" class="btn btn-default">Sửa</a>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" href="index.php?act=deletehh&ma_hh=<?= $hanghoa['ma_hh'] ?>" class="btn btn-danger">Xóa</a>
              </td>
            </tr>
          <?php endforeach ?>  
        </tbody>
      </table>
      <div>
        <button class="btn btn-default" id="check-all" type="button">Chọn tất cả</button>
        <button class="btn btn-default" id="clear-all" type="button">Bỏ chọn tất cả</button>
        <button class="btn btn-danger" type="submit" id="btn-delete">Xóa các mục đã chọn</button>
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