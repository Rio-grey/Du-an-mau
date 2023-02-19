<?php
  function viewcart($del) {
    global $img_path;
    $tong=0;
    $i=0;
    if($del==1) {
      $xoa_hh_addtocart_th='<th>Thao tác</th>';
    } else {
      $xoa_hh_addtocart_th='';
    }
    echo '
      <tr class="title-table">
        <th>Hình</th>
        <th>Sản phẩm</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
        '.$xoa_hh_addtocart_th.'
      </tr>
    ';
    foreach ($_SESSION['mycart'] as $cart) {
      $hinh=$img_path.$cart[2];
      $tong_tien=$cart[3]*$cart[4];
      $tong+=$tong_tien;
      if($del==1) {
        $xoa_hh_addtocart_td='<td><a href="index.php?act=deletecart&idcart='.$i.'"><input type="button" value="Xóa"></a></td>';
      } else {
        $xoa_hh_addtocart_td='';
      }
      // $xoa_hh_addtocart='<a href="index.php?act=deletecart&idcart='.$i.'"><input type="button" value="Xóa"></a>';
      echo '
        <tr>
          <td><img src="'.$hinh.'" height="80px"></td>
          <td>'.$cart[1].'</td>
          <td>$'.$cart[3].'</td>
          <td>'.$cart[4].'</td>
          <td>$'.$tong_tien.'</td>
          '.$xoa_hh_addtocart_td.'
        </tr>
      ';
      $i+=1;
    }
    echo '
      <tr>
        <td style="font-weight: 500; " colspan="4">Tổng đơn hàng</td>
        <td style="font-weight: 500; color: #F62682;" colspan="2">$'.$tong.'</td>
      </tr>
    ';
  }
  function bill_chi_tiet($listbill) {
    global $img_path;
    $tong=0;
    $i=0;
    echo '
      <tr class="title-table">
        <th>Hình</th>
        <th>Sản phẩm</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
      </tr>
    ';
    foreach ($listbill as $cart) {
      $hinh=$img_path.$cart['img'];
      $tong+=$cart['thanhtien'];
      // $xoa_hh_addtocart='<a href="index.php?act=deletecart&idcart='.$i.'"><input type="button" value="Xóa"></a>';
      echo '
        <tr>
          <td><img src="'.$hinh.'" height="80px"></td>
          <td>'.$cart['name'].'</td>
          <td>$'.$cart['price'].'</td>
          <td>'.$cart['soluong'].'</td>
          <td>$'.$cart['thanhtien'].'</td>
        </tr>
      ';
      $i+=1;
    }
    echo '
      <tr>
        <td style="font-weight: 500; " colspan="4">Tổng đơn hàng</td>
        <td style="font-weight: 500; color: #F62682;" colspan="2">$'.$tong.'</td>
      </tr>
    ';
  }
  function tong_don_hang() {
    $tong=0;
    foreach ($_SESSION['mycart'] as $cart) {
      $tong_tien=$cart[3]*$cart[4];
      $tong+=$tong_tien;
    }
    return $tong;
  }
  function insert_bill($id_kh, $name, $address, $tel, $email, $pttt, $ngay_dat_hang, $tong_don_hang) {
    $sql = "INSERT INTO `bill`(`id_kh`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `ngaydathang`, `total`) 
    VALUES ('$id_kh','$name','$address','$tel','$email','$pttt','$ngay_dat_hang','$tong_don_hang')";
    return pdo_execute_return_lastInsertId($sql);
  }
  function insert_cart($id_kh, $ma_hh, $img, $name, $price, $so_luong, $thanh_tien, $idbill) {
    $sql = "INSERT INTO `cart`(`id_kh`, `ma_hh`, `img`, `name`, `price`, `soluong`, `thanhtien`, `id_bill`) 
    VALUES ('$id_kh', '$ma_hh', '$img', '$name', '$price', '$so_luong', '$thanh_tien', '$idbill')";
    pdo_execute($sql);
  }
  function loadone_bill($idbill) {
    $sql = "SELECT * FROM bill WHERE id_bill=$idbill";
    $bill = pdo_query_one($sql);
    return $bill;
  }
  function loadall_cart($idbill) {
    $sql = "SELECT * FROM cart WHERE id_bill=$idbill";
    $bill = pdo_query($sql);
    return $bill;
  }
  function loadall_cart_count($idbill) {
    $sql = "SELECT * FROM cart WHERE id_bill=$idbill";
    $bill = pdo_query($sql);
    return sizeof($bill);
  }
  function loadall_bill($kyw="",$id_kh=0) {
    $sql = "SELECT * FROM bill WHERE 1";
    if ($id_kh>0) $sql.=" AND id_kh=$id_kh";
    if ($kyw!="") $sql.=" AND id_bill LIKE '%$kyw%'";
    $sql.=" ORDER BY id_bill DESC";
    $listbill = pdo_query($sql);
    return $listbill;
  }
  function delete_bill($id_bill) {
    $sql="DELETE FROM bill WHERE id_bill=$id_bill";
    pdo_execute($sql);
  }
  function update_bill($id_bill,$bill_status) {
    $sql = "UPDATE `bill` SET `bill_status`='$bill_status' WHERE id_bill = $id_bill";
    pdo_execute($sql);
  }
  function get_ttdh($n) {
    switch ($n) {
      case '0':
        $tt="Đơn hàng mới";
        break;
      case '1':
        $tt="Đang xử lý";
        break;
      case '2':
        $tt="Đang giao hàng";
        break;
      case '3':
        $tt="Hoàn tất";
        break;
      default:
        $tt="Đơn hàng mới";
        break;  
    }
    return $tt;
  }
  function loadall_thongke() {
    $sql ="SELECT loai.ma_loai as maloai, loai.ten_loai as tenloai, count(hang_hoa.ma_hh) as countsp, min(hang_hoa.don_gia) as minprice, max(hang_hoa.don_gia) as maxprice, avg(hang_hoa.don_gia) as avgprice"; 
    $sql.=" FROM hang_hoa LEFT JOIN loai ON loai.ma_loai=hang_hoa.ma_loai";
    $sql.=" GROUP BY loai.ma_loai ORDER BY loai.ma_loai DESC";
    $listthongke = pdo_query($sql);
    return $listthongke;
  }
?>