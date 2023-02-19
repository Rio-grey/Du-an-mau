<?php 
  function insert_hanghoa($ten_hh,$don_gia,$giam_gia,$hinh,$mota,$ma_loai) {
    $sql = "INSERT INTO `hang_hoa`(`ten_hh`, `don_gia`, `giam_gia`, `hinh`, `mo_ta`, `ma_loai`) 
    VALUES ('$ten_hh','$don_gia','$giam_gia','$hinh','$mota','$ma_loai')";
    pdo_execute($sql);
  }
  function delete_hanghoa($ma_hh) {
    $sql="DELETE FROM hang_hoa WHERE ma_hh=$ma_hh";
    pdo_execute($sql);
  }
  function show_hanghoa_top10() {
    $sql="SELECT * FROM hang_hoa WHERE 1 ORDER BY so_luot_xem DESC LIMIT 0,10";
    $listhanghoa = pdo_query($sql);
    return $listhanghoa;
  }
  function show_hanghoa_home() {
    $sql="SELECT * FROM hang_hoa WHERE 1 ORDER BY ma_hh DESC LIMIT 0,9";
    $listhanghoa = pdo_query($sql);
    return $listhanghoa;
  }
  function show_hanghoa($search,$id_loai) {
    $sql="SELECT * FROM hang_hoa WHERE 1";
    if($search!="") {
      $sql.=" AND ten_hh LIKE '%".$search."%'"; 
    }
    if($id_loai > 0) {
      $sql.=" AND ma_loai = $id_loai";
    }
    $sql.=" ORDER BY ma_hh";
    // $sql.=" INNER JOIN loai ON hang_hoa.ma_loai=loai.ma_loai";
    $listhanghoa = pdo_query($sql);
    return $listhanghoa;
  }
  function show_ten_danhmuc($ma_loai) {
    if ($ma_loai > 0) {
      $sql = "SELECT * FROM loai WHERE ma_loai=$ma_loai";
      $dm = pdo_query_one($sql);
      extract($dm);
      return $ten_loai;
    } else {
      return "";
    }
  }
  function show_1hanghoa($ma_hh) {
    $sql = "SELECT * FROM hang_hoa WHERE ma_hh=$ma_hh";
    $updatehanghoa = pdo_query_one($sql);
    return $updatehanghoa;
  }
  function show_hanghoa_cungloai($ma_hh,$ma_loai) {
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai=$ma_loai AND ma_hh <> $ma_hh";
    $listhanghoa = pdo_query($sql);
    return $listhanghoa;
  }
  function update_hanghoa($ma_hh,$ten_hh,$don_gia,$giam_gia,$hinh,$mo_ta,$ma_loai,$dac_biet) {
    if ($hinh!="") {
      $sql = "UPDATE `hang_hoa` SET `ten_hh`='$ten_hh',`don_gia`='$don_gia',`giam_gia`='$giam_gia',`hinh`='$hinh',`mo_ta`='$mo_ta',`ma_loai`='$ma_loai',`dac_biet`='$dac_biet' WHERE ma_hh = $ma_hh";
    } else {
      $sql = "UPDATE `hang_hoa` SET `ten_hh`='$ten_hh',`don_gia`='$don_gia',`giam_gia`='$giam_gia',`mo_ta`='$mo_ta',`ma_loai`='$ma_loai',`dac_biet`='$dac_biet' WHERE ma_hh = $ma_hh";
    }
    pdo_execute($sql);
  }
  function checkdacbiet($dacbiet){
    switch ($dacbiet) {
      case '0':
        $db = "";
        break;
      case '1':
        $db = "Limited";
        break;
      default:
        $db = "";
        break;
    }
    return $db;
  }
?>