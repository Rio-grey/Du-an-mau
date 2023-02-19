<?php 
  function insert_taikhoan($ma_kh,$ho_ten,$email,$mat_khau,$hinh) {
    $sql = "INSERT INTO `khach_hang`(`ma_kh`,`ho_ten`, `email`, `mat_khau`, `hinh`)
    VALUES ('$ma_kh','$ho_ten','$email','$mat_khau','$hinh')";
    pdo_execute($sql);
  }
  function insert_taikhoan_admin($ma_kh,$ho_ten,$email,$mat_khau,$hinh,$vai_tro) {
    $sql = "INSERT INTO `khach_hang`(`ma_kh`,`ho_ten`, `email`, `mat_khau`, `hinh`, `vai_tro`)
    VALUES ('$ma_kh','$ho_ten','$email','$mat_khau','$hinh','$vai_tro')";
    pdo_execute($sql);
  }
  function check_user($ma_kh, $mat_khau) {
    $sql = "SELECT * FROM khach_hang WHERE ma_kh='$ma_kh' AND mat_khau='$mat_khau'";
    $checkuser = pdo_query_one($sql);
    return $checkuser;
  }
  function check_matkhau($email) {
    $sql = "SELECT * FROM khach_hang WHERE email='$email'";
    $checkmk = pdo_query_one($sql);
    return $checkmk;
  }
  function edit_taikhoan($id_kh,$ma_kh,$ho_ten,$email,$mat_khau,$hinh) {
    if ($hinh!="") {
      $sql = "UPDATE `khach_hang` SET `ma_kh`='$ma_kh',`ho_ten`='$ho_ten',`email`='$email',`mat_khau`='$mat_khau',`hinh`='$hinh' WHERE id_kh='$id_kh'";
    } else {
      $sql = "UPDATE `khach_hang` SET `ma_kh`='$ma_kh',`ho_ten`='$ho_ten',`email`='$email',`mat_khau`='$mat_khau' WHERE id_kh='$id_kh'";
    }
    pdo_execute($sql);
  }
  function show_taikhoan() {
    $sql="SELECT * FROM khach_hang ORDER BY ma_kh";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
  }
  function show_1taikhoan($id_kh) {
    $sql = "SELECT * FROM khach_hang WHERE id_kh=$id_kh";
    $updatetaikhoan = pdo_query_one($sql);
    return $updatetaikhoan;
  }
  function update_taikhoan($id_kh,$ma_kh,$ho_ten,$email,$mat_khau,$hinh,$vai_tro) { 
    if ($hinh!="") {
      $sql = "UPDATE `khach_hang` SET `ma_kh`='$ma_kh',`ho_ten`='$ho_ten',`email`='$email',`mat_khau`='$mat_khau',`hinh`='$hinh',`vai_tro`='$vai_tro' WHERE id_kh='$id_kh'";
    } else {
      $sql = "UPDATE `khach_hang` SET `ma_kh`='$ma_kh',`ho_ten`='$ho_ten',`email`='$email',`mat_khau`='$mat_khau',`vai_tro`='$vai_tro' WHERE id_kh='$id_kh'";
    }
    pdo_execute($sql);
  }
  function delete_taikhoan($id_kh) {
    $sql="DELETE FROM khach_hang WHERE id_kh=$id_kh";
    pdo_execute($sql);
  }
  function checkvaitro($vaitro){
    switch ($vaitro) {
      case '0':
        $vt = "Khách hàng";
        break;
      case '1':
        $vt = "Admin";
        break;
      default:
        $vt = "Khách hàng";
        break;
    }
    return $vt;
  }
?>