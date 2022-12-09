<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/LOGO-PHP.png">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/product.css">
    <!-- Custom fonts for this template-->
    <link href="./bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <!-- <link href="./bootstrap/css/sb-admin-2.min.css" rel="stylesheet"> -->
    <!-- Thu vien bootstrap 5 -->
    <link rel="stylesheet" href="./lib/css/bootstrap.css">
    <script src="./lib/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="./js/main.js"></script>
    <script src="./bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="./bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./bootstrap/js/sb-admin-2.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="./bootstrap/js/main.js"></script>

</head>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="images/LOGO-PHP-NGANG.png" alt="logo-thiet-bi-cong-nghe" height="30px" width="160px" style="margin-top:-5px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarToggler">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link text-primary fw-bold" aria-current="page" href="index.php?layout=home">Trang chủ<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">   
          <a class="nav-link text-primary fw-bold" href="index.php?layout=gioi_thieu">Giới thiệu</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-primary fw-bold" data-bs-toggle="dropdown" role="button" aria-expanded="false">Laptop</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?layout=laptop">Tất cả sản phẩm</a></li>
              <li><a class="dropdown-item" href="index.php?layout=theo_hang_sx&&ten_hangsx=Acer&&loai=Laptop">Acer</a></li>
              <li><a class="dropdown-item" href="index.php?layout=theo_hang_sx&&ten_hangsx=Apple&&loai=Laptop">Apple</a></li>
              <li><a class="dropdown-item" href="index.php?layout=theo_hang_sx&&ten_hangsx=Asus&&loai=Laptop">Asus</a></li>
              <li><a class="dropdown-item" href="index.php?layout=theo_hang_sx&&ten_hangsx=Dell&&loai=Laptop">Dell</a></li>
              <li><a class="dropdown-item" href="index.php?layout=theo_hang_sx&&ten_hangsx=HP&&loai=Laptop">HP</a></li>
              <li><a class="dropdown-item" href="index.php?layout=theo_hang_sx&&ten_hangsx=Lenovo&&loai=Laptop">Lenovo</a></li>
              <li><a class="dropdown-item" href="index.php?layout=theo_hang_sx&&ten_hangsx=MSI&&loai=Laptop">MSI</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-primary fw-bold" data-bs-toggle="dropdown" role="button" aria-expanded="false">PC</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?layout=pc">Tất cả sản phẩm</a></li>
              <li><a class="dropdown-item" href="index.php?layout=theo_hang_sx&&ten_hangsx=Acer&&loai=PC">Acer</a></li>
              <li><a class="dropdown-item" href="index.php?layout=theo_hang_sx&&ten_hangsx=Apple&&loai=PC">Apple</a></li>
              <li><a class="dropdown-item" href="index.php?layout=theo_hang_sx&&ten_hangsx=Asus&&loai=PC">Asus</a></li>
              <li><a class="dropdown-item" href="index.php?layout=theo_hang_sx&&ten_hangsx=Dell&&loai=PC">Dell</a></li>
              <li><a class="dropdown-item" href="index.php?layout=theo_hang_sx&&ten_hangsx=HP&&loai=PC">HP</a></li>
              <li><a class="dropdown-item" href="index.php?layout=theo_hang_sx&&ten_hangsx=Lenovo&&loai=PC">Lenovo</a></li>
              <li><a class="dropdown-item" href="index.php?layout=theo_hang_sx&&ten_hangsx=MSI&&loai=PC">MSI</a></li>
            </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-primary fw-bold" target="_black" href="https://hoangminhdev.tech">Tin công nghệ</a>
        </li>
        <li class="nav-item">
          <form action="index.php?layout=tim_kiem" method="post" class="input-group my-2 my-lg-0">
            <input name="tim-kiem" class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="button-search">
            <button type="submit" class="btn btn-primary" name="btn-tim-kiem" id="button-search">Search</button>
          </form>
        </li>
      </ul>
      <div class="nav-item">
        <?php include 'admin/pages/login.php'?> 
      </div>
      <div class="nav-item">
        <a href="index.php?layout=gio_hang" class="text-dark">
          <?php include 'pages/giohang/gio-hang-cua-ban.php' ?>
        </a>
      </div>
    </div>
  </div>
</nav>


