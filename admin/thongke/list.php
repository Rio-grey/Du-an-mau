<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thống kê</title>
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
    <h2 style="text-align: center; font-size: 30px;">Thống kê theo loại</h2>
  </div>
  <br>
  <table class="table">
    <thead>
      <tr>
        <th>Mã loại</th>
        <th>Loại hàng</th>
        <th>Số lượng</th>
        <th>Giá cao nhất</th>
        <th>Giá thấp nhất</th>
        <th>Giá trung bình</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        foreach ($listthongke as $thongke) {
          extract($thongke);
          echo '
            <tr>
              <td>'.$maloai.'</td>
              <td>'.$tenloai.'</td>
              <td>'.$countsp.'</td>
              <td>'.$maxprice.'</td>
              <td>'.$minprice.'</td>
              <td>'.$avgprice.'</td>
            </tr>
          ';
        }
      ?>
    </tbody>
  </table>
  <br>
  <div class="row">
    <a href="index.php?act=bieudo" class="btn btn-default">Xem biểu đồ</a>
  </div>
</body>
</html>