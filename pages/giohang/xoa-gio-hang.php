<?php
  $user = $_SESSION['username'];
  $truyvan_user = mysqli_query($conn,"SELECT * FROM taikhoan WHERE username = '$user'");
  $thucthi_user = mysqli_fetch_array($truyvan_user);
  $id_user = $thucthi_user['id_tk'];
  $id_sp = $_GET['id_sp'];
  if($_GET['type'] == 'simple'){
    mysqli_query($conn, "DELETE FROM giohang WHERE id_sp='$id_sp' and id_tk = '$id_user'");
  }else{
    mysqli_query($conn, "DELETE FROM giohang WHERE id_tk = '$id_user'");
  }
?>
<script> location.replace("index.php?layout=gio_hang"); </script>