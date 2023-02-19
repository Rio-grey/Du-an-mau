<?php 
  function insert_binhluan($id_kh, $ma_hh, $noi_dung, $ngay_bl) {
    $sql = "INSERT INTO `binh_luan`(`id_kh`, `ma_hh`, `noi_dung`, `ngay_bl`) 
    VALUES ('$id_kh','$ma_hh','$noi_dung','$ngay_bl')";
    pdo_execute($sql);
  }
  function show_binhluan($ma_hh) {
    $sql="SELECT * FROM binh_luan INNER JOIN khach_hang ON khach_hang.id_kh=binh_luan.id_kh WHERE ma_hh=$ma_hh ORDER BY ma_bl DESC";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
  }
  function show_binhluan_admin() {
    $sql="SELECT * FROM binh_luan INNER JOIN khach_hang ON khach_hang.id_kh=binh_luan.id_kh INNER JOIN hang_hoa ON hang_hoa.ma_hh=binh_luan.ma_hh";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
  }
  function delete_binhluan($ma_bl,$id_kh) {
    if ($id_kh==0) {
      $sql="DELETE FROM binh_luan WHERE ma_bl=$ma_bl";
    } else {
      $sql="DELETE FROM binh_luan WHERE id_kh=$id_kh";
    }
    pdo_execute($sql);
  }
?>
<!-- INNER JOIN hang_hoa ON hang_hoa.ma_hh=binh_luan.ma_hh -->