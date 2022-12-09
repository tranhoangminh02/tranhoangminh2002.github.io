<?php
    session_start();
    include_once 'database/config.php';

    // Kiểm tra và xử lý FORM đăng nhập
    if (isset($_POST['login-submit'])) {

        $user = $_POST['username_login'];
        $pass = $_POST['pass_login'];
        if (isset($user) && isset($pass)) {
            $sql = "SELECT *FROM taikhoan WHERE username='$user' and password= '$pass'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
            $rows = mysqli_num_rows($query);
            if ($rows > 0) {
                $_SESSION['username'] = $user;
                $_SESSION['pass'] = ($pass);
            } else {
                echo '<center class="alert alert-danger">Tài khoản không tồn tại hoặc bạn không có quyền truy cập!</center>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="./images/LOGO-PHP.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
     <link href="../bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../bootstrap/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                            <!-- <img class="img-responsive w-100 h-100" src="images/avt.jpg" alt="Đây là ảnh nền trang đăng nhập"> -->
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    <?php
                                        if (!isset($_SESSION['username'])) {
                                    ?>

                                    <form class="user" method="post" role="form">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                            name="username_login" id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass_login" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" checked>
                                                <label class="custom-control-label" for="customCheck" disabled>Remember Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" name="login-submit" id="login-submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="#" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="#" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="pages/forgot-password.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="pages/register.php">Create an Account!</a>
                                    </div>
                                    <?php
                                    } else {
                                        if ($row['quyen_truy_cap'] == 2) {
                                            header('location: ./pages/quantri.php');
                                        } else {
                                            header('location: ../index.php');
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="../bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../bootstrap/js/sb-admin-2.min.js"></script>
</body>
</html>