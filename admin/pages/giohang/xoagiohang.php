<?php
  $id = $_GET['id'];
  $query = mysqli_query($conn, "DELETE FROM giohang WHERE id_giohang='$id'");
  echo '<center class="alert alert-success">Sản phẩm đã xoá thành công!</center>';
?>