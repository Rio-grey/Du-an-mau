<?php 
  function insert_danhmuc($ten_loai) {
    $sql = "INSERT INTO `loai`(`ten_loai`) VALUES ('$ten_loai')";
    pdo_execute($sql);
  }
  function delete_danhmuc($ma_loai) {
    $sql="DELETE FROM loai WHERE ma_loai=$ma_loai";
    pdo_execute($sql);
  }
  function show_danhmuc() {
    $sql="SELECT * FROM loai ORDER BY ma_loai";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
  }
  function show_1danhmuc($ma_loai) {
    $sql = "SELECT * FROM loai WHERE ma_loai=$ma_loai";
    $updatedanhmuc = pdo_query_one($sql);
    return $updatedanhmuc;
  }
  function update_danhmuc($ma_loai, $ten_loai) {
    $sql = "UPDATE `loai` SET `ten_loai`='$ten_loai' WHERE ma_loai=$ma_loai";
    pdo_execute($sql);
  }
?>