<link rel="shortcut icon" href="images/LOGO-PHP.png" type="image/x-icon">
<?php 
    session_start();
    
    require 'database/config.php';
    if(isset($_SESSION['username'])){
        $user = $_SESSION['username'];
        $truyvan_user = mysqli_query($conn,"SELECT * FROM taikhoan WHERE username = '$user'");
        $thucthi_user = mysqli_fetch_array($truyvan_user);
        $quyen_truy_cap = $thucthi_user['quyen_truy_cap'];
    }
    include './inc/load.php';
    include './inc/header.php';

    if(isset($_GET['layout'])){
        switch($_GET['layout']){
            case 'gioi_thieu':
                include './pages/gioi-thieu.php';
                break;
            case 'pc':
                include './inc/slide-pc.php';
                include './pages/pc.php';
                break;
            case 'laptop':
                include './inc/slide-laptop.php';
                include './pages/laptop.php';
                break;
            case 'gio_hang':
                include './pages/giohang/gio-hang.php';
                break;
            case 'xoa_gio_hang':
                include './pages/giohang/xoa-gio-hang.php';
                break;
            case 'them_gio_hang':
                include './pages/giohang/them-gio-hang.php';
                break;
            case 'cap_nhat_gio_hang':
                include './pages/giohang/cap-nhat-gio-hang.php';
                break;
            case 'thanh_toan':
                include './pages/giohang/thanh_toan.php';
                break;
            case 'view':
                include './pages/view.php';
                break;
            case 'theo_hang_sx':
                include './pages/sanphamtheohang.php';
                break;
            case 'tim_kiem':
                include './pages/tim-kiem.php';
                break;

            default: 
                include './inc/slide-show.php';
                include './pages/home.php';
        }
    }else{
        include './inc/slide-show.php';
        include './pages/home.php';
    }

    include './inc/footer.php';
    include './inc/sticky.php';
?>