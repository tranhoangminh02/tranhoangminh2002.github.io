<?php
  $id_sp = $_GET['id'];
  $query = mysqli_query($conn, "DELETE FROM sanpham WHERE id_sp='$id_sp'");
  echo '<center class="alert alert-success">Sản phẩm đã xoá thành công!</center>';
?>