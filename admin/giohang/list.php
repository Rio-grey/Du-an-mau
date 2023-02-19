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
      <h2 style="text-align: center; font-size: 30px;">Danh sách đơn hàng</h2>
    </div>
    <br>
    <form action="index.php?act=listbill" method="POST">
      <div class="form-group">
        <label>Tìm kiếm đơn hàng</label>
        <input type="text" name="kyw" class="form-control" style="width: 40%;" placeholder="Nhập mã đơn hàng">
        <button type="submit" name="filter" style="margin-left: 10px; padding: 7px; border: 1px solid #ccc; border-radius: 5px; cursor: pointer;">Tìm kiếm</button>
      </div>
      <br>
    </form>
    <form action="index.php?act=delete_bill" method="post">
      <table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Mã đơn hàng</th>
            <th>Khách hàng</th>
            <th>Số lượng hàng</th>
            <th>Giá trị đơn hàng</th>
            <th>Tình trạng đơn hàng</th>
            <th>Ngày đặt hàng</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($listbill as $bill) : ?>
            <?php 
              extract($bill);
              $kh=$bill["bill_name"].'
                <br>Email: '.$bill["bill_email"].'
                <br>Địa chỉ: '.$bill["bill_address"].'
                <br>SĐT: '.$bill["bill_tel"]
              ;  
              $countsp=loadall_cart_count($bill['id_bill']);
              $ttdh=get_ttdh($bill["bill_status"]);
            ?>
            <tr>
              <td><input type="checkbox" name="check[]" value="<?= $bill['id_bill'] ?>" id=""></td>
              <td>DAM-<?= $bill['id_bill'] ?></td>
              <td><?= $kh ?></td>
              <td><?= $countsp ?></td>
              <td><?= $bill['total'] ?></td>
              <td><?= $ttdh ?></td>
              <td><?= $bill['ngaydathang'] ?></td>
              <td>
                <a href="index.php?act=updatebill&id_bill=<?= $bill['id_bill'] ?>" class="btn btn-default">Sửa</a>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" href="index.php?act=deletebill&id_bill=<?= $bill['id_bill'] ?>" class="btn btn-danger">Xóa</a>
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