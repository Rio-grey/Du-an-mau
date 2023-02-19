<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List danh mục</title>
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
    <h2 style="text-align: center; font-size: 30px;">Danh sách danh mục</h2>
  </div>
  <br>
  <table class="table">
    <thead>
      <tr>
        <th></th>
        <th>Mã loại</th>
        <th>Tên loại</th>
        <th>
          <a href="index.php?act=adddm" class="btn btn-default">Thêm danh mục</a>
        </th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($listdanhmuc as $danhmuc) : ?>
          <tr>
            <td><input type="checkbox" name="i" id=""></td>
            <td><?= $danhmuc['ma_loai'] ?></td>
            <td><?= $danhmuc['ten_loai'] ?></td>
            <td>
              <a href="index.php?act=updatedm&ma_loai=<?= $danhmuc['ma_loai'] ?>" class="btn btn-default">Sửa</a>
              <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" href="index.php?act=deletedm&ma_loai=<?= $danhmuc['ma_loai'] ?>">Xóa</a>
            </td>
          </tr>
        <?php endforeach ?>  
    </tbody>
  </table>
  <div>
    <button class="btn btn-default" id="check-all" type="button">Chọn tất cả</button>
    <button class="btn btn-default" id="clear-all" type="button">Bỏ chọn tất cả</button>
    <button type="submit" class="btn btn-danger" id="btn-delete">Xóa các mục đã chọn</button>
  </div>
  <script>
    document.getElementById("check-all").onclick = function () {
      // Lấy danh sách checkbox
      var checkboxes = document.getElementsByName("i");

      // Lặp và thiết lập checked
      for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = true;
      }
    };

    // Chức năng bỏ chọn hết
    document.getElementById("clear-all").onclick = function () {
      // Lấy danh sách checkbox
      var checkboxes = document.getElementsByName("i");

      // Lặp và thiết lập Uncheck
      for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = false;
      }
    };
  </script>
</body>
</html>