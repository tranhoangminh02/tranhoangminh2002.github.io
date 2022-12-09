<?php
    include '../database/config.php';
    $email = $_GET['email'];
    if(isset($_POST['submit'])){
        $pass = $_POST['pass_1'];
        $pass_2 = $_POST['pass_2'];

        if(isset($_POST['pass_1'])){
            if(($pass === $pass_2) && !empty($pass) && !empty($pass_2)){
                mysqli_query($conn, "UPDATE taikhoan SET password = '$pass' WHERE email = '$email'");
                echo'
                    <script language="javascript">
                        alert("Đổi mật khẩu thành công!");
                    </script>';
                header("Location: ../index.php");
                
            }else{
                if($pass != $pass_2){
                    echo'
                    <script language="javascript">
                        alert("Mật khẩu không trùng khớp!");
                    </script>';
                }
                if(empty($pass)){
                    echo'
                       <script language="javascript">
                           alert("Mật khẩu chưa được nhập!");
                       </script>';
               }
               if(empty($pass_2)){
                echo'
                   <script language="javascript">
                       alert("Mật khẩu chưa được nhập lại");
                   </script>';
           }
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

    <title>SB Admin 2 - Forgot Password</title>

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
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div>
                                    <form class="user" method="POST" role="form">
                                        <div class="form-group">
                                            <input type="password" name="pass_1" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Password ...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass_2" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Retype Password ...">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Reset Password</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
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