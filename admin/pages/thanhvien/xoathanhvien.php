<?php
  $id = $_GET['id_tk'];
  mysqli_query($conn, "DELETE FROM `taikhoan` WHERE id_tk='$id'");
  // echo '<center class="alert alert-success">Xoá bình luận thành công!</center>';
    echo '<script> location.replace("quantri.php?layout=quanlythanhvien"); </script>';
?>
