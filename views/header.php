<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>X-Shop</title>
    <script src="https://kit.fontawesome.com/91fe53bdda.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="./css/app.css">
  </head>
  <body>
    <div class="boxcenter">
      <div class="row mb header">
        <h1><a href="index.php">SIÊU THỊ TRỰC TUYẾN</a></h1>
      </div>
      <div class="row mb menu">
        <ul>
          <li><a href="index.php">Trang chủ</a></li>
          <li><a href="index.php?act=about">Giới thiệu</a></li>
          <li><a href="index.php?act=contact">Liên hệ</a></li>
          <li><a href="index.php?act=gopy">Góp ý</a></li>
          <li><a href="index.php?act=hoidap">Hỏi đáp</a></li>
        </ul>
        <?php if (isset($_SESSION['user'])) : ?>
          <a href="index.php?act=addtocart" class="shopping-cart"><i class="fa-solid fa-cart-shopping"></i></a>
        <?php else : ?>
          <a onclick="return alert('Bạn cần phải đăng nhập')" href="index.php" class="shopping-cart"><i class="fa-solid fa-cart-shopping"></i></a>  
        <?php endif ?>  
      </div>