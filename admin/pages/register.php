<?php
    session_start();
    include '../../database/config.php';
    // Kiểm tra và xử lý FORM đăng ký
    if (isset($_POST['register-submit'])) {

        $fname_ = $_POST['fname_register'];
        $user_ = $_POST['username_register'];
        $pass_ = $_POST['password_register'];
        $pass__ = $_POST['confirm-password_register'];
        $email_ = $_POST['email_register'];
        $address_ = $_POST['address_register'];
        $tel_ = $_POST['tel_register'];
        zxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        $query_email_exits = mysqli_query($conn, "SELECT email FROM taikhoan WHERE email = '$email_'");
        if (isset($email_) && isset($pass_)) {
            if(mysqli_num_rows($query_email_exits) > 0){
            echo'
                <script language="javascript">
                    alert("Email này đã tồn tại! Vui lòng thử lại!!!")
                </script>';
            }else{
                mysqli_query($conn, "INSERT INTO `taikhoan`(`id_tk`, `ho_ten`, `username`, `password`, `email`, `quyen_truy_cap`, `dia_chi`, `sdt`)
                                                    VALUES (null,'$fname_','$user_','$pass_','$email_','1','$address_','$tel_')");
                $_SESSION['email'] = $email_;
                $_SESSION['pass'] = $pass_;
                // echo'
                // <script language="javascript">
                //     alert("DANG KY THANH CONG")
                // </script>';
                    header('location: ./index.php');
            }      
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="../../bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" id="register-form"  method="POST" role="form">
                                <div class="form-group">
									<input type="text" name="fname_register" id="username" tabindex="1" class="form-control" placeholder="Full name" value="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="address_register" id="username" tabindex="1" class="form-control" placeholder="Address" value="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="tel_register" id="username" tabindex="1" class="form-control" placeholder="Telephone" value="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username_register" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email_register" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_register" id="password" tabindex="2" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm-password_register" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                </div>
                                <button class="btn btn-primary btn-user btn-block" type="submit" name="register-submit" id="register-submit">
                                    Register Account
                                </button>
                                <hr>
                                <a href="#" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="#" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="../index.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="../../bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../bootstrap/js/sb-admin-2.min.js"></script>
</body>
</html>