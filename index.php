<?php
  session_start();
  include "models/PDO.php";
  include "models/hanghoa.php";
  include "models/danhmuc.php";
  include "models/taikhoan.php";
  include "models/cart.php";
  include "views/header.php";
  include "global.php";

  if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];

  $hhnew = show_hanghoa_home();
  $dsdm = show_danhmuc();
  $dstop10 = show_hanghoa_top10();
  if((isset($_GET['act'])) && ($_GET['act']!="")) {
    $act = $_GET['act'];
    switch ($act) {
      case 'hang_hoa':
        if (isset($_POST['search']) && ($_POST['search'] != "")) {
          $search=$_POST['search'];
        } else {
          $search="";
        }
        if (isset($_GET['ma_loai']) && ($_GET['ma_loai'] > 0)) {
          $ma_loai = $_GET['ma_loai'];
          
        } else {
          $ma_loai = 0;
        }
        $dshh = show_hanghoa($search,$ma_loai);
        $tendm = show_ten_danhmuc($ma_loai);
        include "views/hang_hoa.php";
        break;
      case 'hang_hoa_chi_tiet':
        if (isset($_GET['ma_hh']) && ($_GET['ma_hh'] > 0)) {
          $ma_hh = $_GET['ma_hh'];
          $hang_hoa_one=show_1hanghoa($ma_hh);
          extract($hang_hoa_one);
          $hh_cungloai=show_hanghoa_cungloai($ma_hh,$ma_loai);
          include "views/hang_hoa_chi_tiet.php";
        } else {
          include "views/home.php";
        }
        break;
      case 'dangky':
        if (isset($_POST['dangky'])) {
          $ma_kh = $_POST['makh'];
          $ho_ten = $_POST['hoten'];
          $email = $_POST['email'];
          $mat_khau = $_POST['pass'];
          //lấy file
          $file = $_FILES['hinh'];
          //Lấy tên file
          $hinh = $file['name'];
          move_uploaded_file($file['tmp_name'], './images/users/' . $hinh);
          insert_taikhoan($ma_kh,$ho_ten,$email,$mat_khau,$hinh);
          $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập để thực hiện chức năng";
        }
        include "views/accounts/dang_ky.php";
        break;
      case 'dangnhap':
        if (isset($_POST['dangnhap'])) {
          $ma_kh = $_POST['makh'];
          $mat_khau = $_POST['pass'];
          $checkuser = check_user($ma_kh, $mat_khau);
          if (is_array($checkuser)) {
            $_SESSION['user'] = $checkuser;
            // $thongbao = "Đã đăng nhập thành công";
            header('Location: index.php');
          } else {
            $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký";
          }
        }
        include "views/accounts/dang_ky.php";
        break;
      case 'edit_taikhoan':
        if (isset($_POST['capnhat'])) {
          $id_kh = $_POST['idkh'];
          $ma_kh = $_POST['makh'];
          $ho_ten = $_POST['hoten'];
          $email = $_POST['email'];
          $mat_khau = $_POST['pass'];
          $hinh = $_POST['hinh'];
          //lấy file
          $file = $_FILES['hinh'];
          //Lấy tên file
          $hinh = $file['name'];
          move_uploaded_file($file['tmp_name'], './images/users/' . $hinh);
          edit_taikhoan($id_kh,$ma_kh,$ho_ten,$email,$mat_khau,$hinh);
          $_SESSION['user'] = check_user($ma_kh, $mat_khau);
          header('Location: index.php?act=edit_taikhoan');
          $thongbao = "Đã cập nhật thành công. Vui lòng đăng nhập để thực hiện chức năng";
        }
        include "views/accounts/edit_taikhoan.php";
        break;
      case 'quenmk':
        if (isset($_POST['guiemail'])) {
          $email = $_POST['email'];
          $checkmk = check_matkhau($email);
          if (is_array($checkmk)) {
            $thongbao = "Mật khẩu của bạn là: ".$checkmk['mat_khau'];
          } else {
            $thongbao = "Email này không tồn tại";
          }
        }
        include "views/accounts/quenmk.php";
        break;
      case 'thoat':
        session_unset();
        header('Location: index.php');
        break;
      case 'addtocart':
        if (isset($_POST['addtocart'])) {
          $ma_hh=$_POST['ma_hh'];
          $ten_hh=$_POST['ten_hh'];
          $hinh=$_POST['hinh'];
          $don_gia=$_POST['don_gia'];
          $so_luong=$_POST['soluong'];
          $thanh_tien = $so_luong * $don_gia;
          // kiểm tra sp đã có trong giỏ hàng hay không
          $fl=0; // kiểm tra sp có trong giỏ hàng không
          for ($i=0; $i < sizeof($_SESSION['mycart']); $i++) { 
            if($_SESSION['mycart'][$i][1]==$ten_hh) {
              $fl=1;
              $so_luong_new = $so_luong + $_SESSION['mycart'][$i][4];
              $_SESSION['mycart'][$i][4]=$so_luong_new;
              break;
            }
          }
          // nếu k trùng thì thêm mới
          if ($fl==0) {
            // thêm mới sản phẩm vào giỏ hàng
            $hhaddtocart=[$ma_hh,$ten_hh,$hinh,$don_gia,$so_luong,$thanh_tien];
            array_push($_SESSION['mycart'],$hhaddtocart);
          }
        }
        include "views/cart/viewcart.php";
        break;   
      case 'deletecart':
        if(isset($_GET['idcart'])) {
          // xóa từng cái 1 
          array_splice($_SESSION['mycart'],$_GET['idcart'],1);
        } else {
          // xóa tất cả giỏ hàng
          $_SESSION['mycart']=[];
        }
        header('Location: index.php?act=viewcart');
        break;   
      case 'bill':
        include "views/cart/bill.php";
        break;
      case 'billconfirm':
        // tạo bill
        if(isset($_POST['dongydathang'])) {
          if(isset($_SESSION['user'])) $id_kh=$_SESSION['user']['id_kh'];
          else $id_kh=0;
          $name=$_POST['ho_ten'];
          $email=$_POST['email'];
          $tel=$_POST['phone'];
          $address=$_POST['address'];
          $pttt=$_POST['pttt'];
          $ngay_dat_hang=date('d/m/Y');
          $tong_don_hang=tong_don_hang();
          $idbill=insert_bill($id_kh,$name, $address, $tel, $email, $pttt, $ngay_dat_hang, $tong_don_hang);
          // insert into cart : $session['mycart'] & $idbill
          foreach ($_SESSION['mycart'] as $cart) {
            insert_cart($_SESSION['user']['id_kh'],$cart['0'],$cart['2'],$cart['1'],$cart[3],$cart[4],$cart[5],$idbill);
          }
          // xóa session cart
          $_SESSION['cart']=[];
        }
        
        $bill = loadone_bill($idbill);
        $billct = loadall_cart($idbill);
        include "views/cart/billconfirm.php";
        break;
      case 'viewcart':
        include "views/cart/viewcart.php";
        break;
      case 'mybill':
        $listbill = loadall_bill($_SESSION['user']['id_kh']);
        include "views/cart/mybill.php";
        break;
      case 'about':
        include "views/about.php";
        break;
      case 'contact':
        include "views/contact.php";
        break;
      default:
        include "views/home.php";
        break;  
    }
  } else {
    include "views/home.php";
  }
  include "views/footer.php";
?>