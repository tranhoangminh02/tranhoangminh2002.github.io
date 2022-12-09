<?php
    // $conn = mysqli_connect('localhost', 'root', '', 'cuahangmaytinh');
    // mysqli_set_charset($conn, 'UTF8');
    if (isset($_SESSION['username'])) {
        $user = $_SESSION['username'];
        $result = mysqli_query($conn,"SELECT * FROM taikhoan WHERE username ='$user'");
        $r = mysqli_fetch_array($result);
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
    <link rel="shortcut icon" href="../images/LOGO-PHP.png" type="image/x-icon">

    <title>Trang quản trị</title>

    <!-- Custom fonts for this template-->
    <link href="../../bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../bootstrap/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Trinh soan thao van ban -->
    <script src="https://cdn.ckeditor.com/4.18.0/full-all/ckeditor.js"></script>

</head>