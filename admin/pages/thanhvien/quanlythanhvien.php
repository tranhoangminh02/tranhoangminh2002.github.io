<script>
  function delete_baiviet() {
    var confirm = confirm("Bạn có chắc chắn muốn xóa mục này hay không?");
    return confirm;
  }
</script>

<?php
  if (isset($_GET['page'])) {
      $page = $_GET['page'];
  } else {
      $page = 1;
  }
  $rowPerPage = 5;
  $perPage = $page * $rowPerPage - $rowPerPage;
  $query = mysqli_query($conn, "SELECT * FROM taikhoan LIMIT $perPage,$rowPerPage");
  $totalRows = mysqli_num_rows($query);
  $totalPages = ceil($totalRows / $rowPerPage);
  $listPage = "";

    for ($i = 1; $i <= $totalPages; $i++) {
        if ($page == $i) {
            $listPage .= '
              <li class="page-item">
                <a class="page-link" href="quantri.php?layout=quanlythanhvien&page=' . $i . '">' . $i . '</a>
              </li>

            ';
        } else {
            $listPage .= '
              <li class="page-item">
                <a class="page-link" href="quantri.php?layout=quanlythanhvien&page=' . $i . '">' . $i . '</a>
              </li>
            ';
        }
    }

?>
  <h1 class="panel-title">QUẢN LÝ THÀNH VIÊN</h1>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="./quantri.php?layout=themthanhvien" class="btn btn-primary" role="button">Thêm thành viên</a>
    </div>
    <div class="card-body">
      <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead class="text-center align-middle">
            <th>Họ tên</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Quyền truy cập</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th class="update">Sửa</th>
            <th class="delete">Xoá</th>
          </thead>
          <?php
            while ($row = mysqli_fetch_array($query)) {
              echo '
                <tr>
                  <td align="center" class="text-center align-middle">' . $row['ho_ten'] . '</td>
                  <td align="center" class="text-center align-middle">' . $row['username'] . '</td>
                  <td align="center" class="text-center align-middle">' . $row['password'] . '</td>
                  <td align="center" class="text-center align-middle">' . $row['email'] . '</td>
                  <td align="center" class="text-center align-middle">' . $row['quyen_truy_cap'] . '</td>
                  <td align="center" class="text-center align-middle">' . $row['sdt'] . '</td>
                  <td align="center" class="text-center align-middle">' . $row['dia_chi'] . '</td>
                  <td align="center" class="text-center align-middle">
                    <a href="./quantri.php?layout=suathanhvien&&id=' . $row['id_tk'] . '" class="text-warning"><i class="fas fa-edit"></i></a>
                  </td>
                  <td align="center" class="text-center align-middle">
                    <a href="./quantri.php?layout=xoathanhvien&&id_tk=' . $row['id_tk'] . '" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
              ';
            }
          ?>
        </table>
      </div>
    </div>
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
        <?php echo $listPage?>
    </ul>
  </nav>

