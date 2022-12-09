<?php
  $id = $_GET['id'];
  $query = mysqli_query($conn, "DELETE FROM binhluan WHERE id='$id'");
//   echo '<center class="alert alert-success">Xoá bình luận thành công!</center>';
    echo '<script> location.replace("quantri.php?layout=quanlybinhluan"); </script>';
?>