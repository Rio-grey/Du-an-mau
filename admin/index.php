<?php 
  include "../models/PDO.php";
  include "../models/danhmuc.php";
  include "../models/hanghoa.php";
  include "../models/taikhoan.php";
  include "../models/binhluan.php";
  include "../models/cart.php";
  include "header.php";
  // controller
  if(isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
      case 'adddm':
        // kiểm tra xem người dùng có click vào nút add không
        if (isset($_POST['btn_insert'])) {
          $ten_loai = $_POST['tenloai'];
          insert_danhmuc($ten_loai);
          $thongbao = "Thêm thành công";
        }
        include "danhmuc/add.php";
        break;
      case 'listdm':
        $listdanhmuc = show_danhmuc();
        include "danhmuc/list.php";
        break;
      case 'deletedm':
        $ma_loai = $_GET['ma_loai'];
        delete_danhmuc($ma_loai);
        $listdanhmuc = show_danhmuc();
        include "danhmuc/list.php";
        break;
      case 'updatedm':
        $ma_loai = $_GET['ma_loai'];
        $updatedanhmuc = show_1danhmuc($ma_loai);
        include "danhmuc/update.php";
        break;  
      case 'editdm':
        if (isset($_POST['btn_update'])) {
          $ma_loai = $_POST['ma_loai'];
          $ten_loai = $_POST['tenloai'];
          update_danhmuc($ma_loai, $ten_loai);
          $thongbao = "Cập nhật thành công";
        }
        $listdanhmuc = show_danhmuc();
        include "danhmuc/list.php";
        break;  
      /* controller hàng hóa */  
      case 'addhh':
        // kiểm tra xem người dùng có click vào nút add không
        if (isset($_POST['btn_insert'])) {
          $ten_hh = $_POST['tenhh'];
          $don_gia = $_POST['dongia'];
          $giam_gia = $_POST['giamgia'];
          $mo_ta = $_POST['mota'];
          $ma_loai = $_POST['ma_loai'];
          //lấy file
          $file = $_FILES['hinh'];
          //Lấy tên file
          $hinh = $file['name'];
          move_uploaded_file($file['tmp_name'], '../images/products/' . $hinh);
          insert_hanghoa($ten_hh,$don_gia,$giam_gia,$hinh,$mo_ta,$ma_loai);
          $thongbao = "Thêm thành công";
        }
        $listdanhmuc = show_danhmuc();
        include "hanghoa/add.php";
        break;
      case 'listhh':
        if(isset($_POST['filter'])) {
          $search = $_POST['search'];
          $ma_loai=$_POST['ma_loai'];
        } else {
          $search="";
          $ma_loai=0;
        }
        $listdanhmuc = show_danhmuc();
        $listhanghoa = show_hanghoa($search,$ma_loai);
        include "hanghoa/list.php";
        break;
      case 'deletehh':
        $ma_hh = $_GET['ma_hh'];
        delete_hanghoa($ma_hh);
        $listhanghoa = show_hanghoa("",0);
        $listdanhmuc = show_danhmuc();
        include "hanghoa/list.php";
        break;
      case 'delete_hh':
        if (isset($_POST['check'])) {
          $check = $_POST['check'];
          foreach ($check as $mahh) {
            $ma_hh = $mahh;
            delete_hanghoa($ma_hh);
          }
        }
        $listhanghoa = show_hanghoa("",0);
        $listdanhmuc = show_danhmuc();
        include "hanghoa/list.php";
        break;
      case 'updatehh':
        $ma_hh = $_GET['ma_hh'];
        $updatehanghoa = show_1hanghoa($ma_hh);
        $listdanhmuc = show_danhmuc();
        include "hanghoa/update.php";
        break;  
      case 'edithh':
        if (isset($_POST['btn_update'])) {
          $ma_hh = $_POST['ma_hh'];
          $ten_hh = $_POST['tenhh'];
          $hinh = $_POST['hinh'];
          $don_gia = $_POST['dongia'];
          $giam_gia = $_POST['giamgia'];
          $mo_ta = $_POST['mota'];
          $ma_loai = $_POST['ma_loai'];
          $dac_biet = $_POST['dacbiet'];
          //lấy file
          $file = $_FILES['hinh'];
          //Lấy tên file
          $hinh = $file['name'];
          move_uploaded_file($file['tmp_name'], '../images/products/' . $hinh);
          update_hanghoa($ma_hh,$ten_hh,$don_gia,$giam_gia,$hinh,$mo_ta,$ma_loai,$dac_biet);
          $thongbao = "Cập nhật thành công";
        }
        $listdanhmuc = show_danhmuc();
        $listhanghoa = show_hanghoa("",0);
        include "hanghoa/list.php";
        break;  
      case 'listkh':
        $listtaikhoan = show_taikhoan();
        include "taikhoan/list.php";
        break;
      case 'addkh':
        if (isset($_POST['btn_insert'])) {
          $ma_kh = $_POST['makh'];
          $ho_ten = $_POST['hoten'];
          $email = $_POST['email'];
          $mat_khau = $_POST['pass'];
          //lấy file
          $file = $_FILES['hinh'];
          //Lấy tên file
          $hinh = $file['name'];
          move_uploaded_file($file['tmp_name'], '../images/users/' . $hinh);
          $vai_tro = $_POST['vaitro'];
          insert_taikhoan_admin($ma_kh,$ho_ten,$email,$mat_khau,$hinh,$vai_tro);
          $thongbao = "Đã thêm thành công.";
        }
        include "taikhoan/add.php";
        break;
      case 'updatekh':
        $id_kh = $_GET['id_kh'];
        $updatetaikhoan = show_1taikhoan($id_kh);
        include "taikhoan/update.php";
        break;
      case 'editkh':
        if (isset($_POST['btn_update'])) {
          $id_kh = $_POST['id_kh'];
          $ma_kh = $_POST['makh'];
          $ho_ten = $_POST['hoten'];
          $email = $_POST['email'];
          $mat_khau = $_POST['pass'];
          $hinh = $_POST['hinh'];
          //lấy file
          $file = $_FILES['hinh'];
          //Lấy tên file
          $hinh = $file['name'];
          move_uploaded_file($file['tmp_name'], '../images/users/' . $hinh);
          $vai_tro = $_POST['vai_tro'];
          update_taikhoan($id_kh,$ma_kh,$ho_ten,$email,$mat_khau,$hinh,$vai_tro);
          $thongbao = "Đã cập nhật thành công.";
        }
        $listtaikhoan = show_taikhoan();
        include "taikhoan/list.php";
        break;
      case 'deletekh':
        $id_kh = $_GET['id_kh'];
        delete_binhluan(0,$id_kh);
        delete_taikhoan($id_kh);
        $listtaikhoan = show_taikhoan();
        include "taikhoan/list.php";
        break;  
      case 'delete_kh':
        if (isset($_POST['check'])) {
          $check = $_POST['check'];
          foreach ($check as $idkh) {
            $id_kh = $idkh;
            delete_taikhoan($id_kh);
          }
        }
        $listtaikhoan = show_taikhoan();
        include "taikhoan/list.php";
        break;  
      case 'listbl':
        $listbinhluan = show_binhluan_admin();
        include "binhluan/list.php";
        break;  
      case 'deletebl':
        $ma_bl = $_GET['ma_bl'];
        delete_binhluan($ma_bl,0);
        $listbinhluan = show_binhluan_admin();
        include "binhluan/list.php";
        break;
      case 'delete_bl':
        if (isset($_POST['check'])) {
          $check = $_POST['check'];
          foreach ($check as $mabl) {
            $ma_bl = $mabl;
            delete_binhluan($ma_bl,0);
          }
        }
        $listbinhluan = show_binhluan_admin();
        include "binhluan/list.php";
        break;
      case 'thongke':
        $listthongke = loadall_thongke();
        include "thongke/list.php";
        break;       
      case 'bieudo':
        $listthongke = loadall_thongke();
        include "thongke/bieudo.php";
        break;       
      case 'listbill':
        if(isset($_POST['kyw'])&&($_POST['kyw']!="")) {
          $kyw=$_POST['kyw'];
        } else {
          $kyw="";
        }
        $listbill=loadall_bill($kyw,0);
        include "giohang/list.php";
        break;     
      case 'deletebill':
        $id_bill = $_GET['id_bill'];
        delete_bill($id_bill);
        $listbill=loadall_bill("",0);
        include "giohang/list.php";
        break;
      case 'delete_bill':
        if (isset($_POST['check'])) {
          $check = $_POST['check'];
          foreach ($check as $id) {
            $id_bill = $id;
            delete_bill($id_bill);
          }
        }
        $listbill=loadall_bill("",0);
        include "giohang/list.php";
        break;
      case 'updatebill':
        $id_bill = $_GET['id_bill'];
        $updatebill = loadone_bill($id_bill);
        include "giohang/update.php";
        break;   
      case 'editbill':
      if (isset($_POST['btn_update'])) {
        $id_bill = $_POST['id_bill'];
        $bill_status = $_POST['bill_status'];
        update_bill($id_bill,$bill_status);
        $thongbao = "Đã cập nhật thành công.";
      }
      $listbill=loadall_bill("",0);
      include "giohang/list.php";
      break; 
      default:
        include "home.php";
        break;  
    }
  } else {
    include "home.php";
  }
  include "footer.php";
?>