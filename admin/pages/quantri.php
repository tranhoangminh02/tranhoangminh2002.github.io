<?php 
  session_start();
  include '../database/config.php';
  include '../inc/header.php';
  include '../inc/sidebar.php';
  include '../inc/topbar.php'
?>
<main class="container-fluid">
  <?php
    if(isset($_GET['layout'])){
      switch ($_GET['layout']) {
        case 'themsanpham':
          include 'sanpham/themsp.php';
          break;
        case 'quanlysanpham':
          include 'sanpham/quanlysp.php';
          break;
        case 'suasanpham':
          include 'sanpham/suasp.php';
          break;
        case 'xoasanpham':
          include 'sanpham/xoasp.php';
          break;

        case 'quanlybinhluan':
          include 'binhluan/quanlybinhluan.php';
          break;
        case 'suabinhluan':
          include 'binhluan/suabinhluan.php';
          break;
        case 'xoabinhluan':
          include 'binhluan/xoabinhluan.php';
          break;

        case 'timkiem':
          include 'tim-kiem-admin.php';
          break;
        case '404':
          include '404.html';
          break;

        case 'quanlythanhvien':
          include 'thanhvien/quanlythanhvien.php';
          break;
        case 'themthanhvien':
          include 'thanhvien/themthanhvien.php';
          break;
        case 'suathanhvien':
          include 'thanhvien/suathanhvien.php';
          break;
        case 'xoathanhvien':
          include 'thanhvien/xoathanhvien.php';
          break;

        case 'quanlygiohang':
          include 'giohang/quanlygiohang.php';
          break;
        case 'xoagiohang':
          include 'giohang/xoagiohang.php';
          break;

        case 'quanlydondathang':
          include 'giohang/quanlydondathang.php';
          break;
        case 'chitietdondathang':
          include 'giohang/chitietdondathang.php';
          break;

        default:
          include 'dashboard.php';
          break;
      }
      }else{
        include 'dashboard.php';
    }
  ?>
</main>
<?php include '../inc/footer.php'?>