<?php
  $id_tk = $_GET['id_tk'];
  $truyvan = mysqli_query($conn,"SELECT * FROM giohang WHERE id_tk = '$id_tk'");
  
  $count = mysqli_num_rows($truyvan);

  $truyvan_user = mysqli_query($conn,"SELECT * FROM taikhoan WHERE id_tk = '$id_tk'");
  $row_user = mysqli_fetch_array($truyvan_user);
  date_default_timezone_set('Asia/SaiGon');
  $ngaythanhtoan = date('Y/m/d H:i:s');

  if(isset($_POST['submit'])){
    $hoten = $_POST['ho_ten'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $ghichu = $_POST['ghichu'];
    while($row = mysqli_fetch_array($truyvan)){
      $tensp = $row['ten_sp'];
      $soluong = $row['so_luong'];
      $hinhanh = $row['hinh_anh'];
      $dongia = $row['thanh_tien'];
      mysqli_query($conn,"INSERT INTO `dondathang`(`id`, `hoten`, `sdt`, `email`, `diachi`, `id_tk`, `tensanpham`, `soluong`, `hinhanh`, `dongia`, `ngaythanhtoan`,`ghichu`) 
                          VALUES (null,'$hoten','$sdt','$email','$diachi','$id_tk','$tensp','$soluong','$hinhanh','$dongia','$ngaythanhtoan','$ghichu')");

      $query_product = mysqli_query($conn,"SELECT * FROM sanpham WHERE `ten_sp`='$tensp'");
      $row_product = mysqli_fetch_array($query_product);
      $update_soluong = $row_product['so_luong'] - $soluong;
      if($update_soluong > 0){
        mysqli_query($conn,"UPDATE `sanpham` SET `so_luong`='$update_soluong' WHERE `ten_sp`='$tensp'");
      }else{
        mysqli_query($conn,"UPDATE `sanpham` SET `so_luong`='0' WHERE `ten_sp`='$tensp'");
      }

    }
    mysqli_query($conn, "DELETE FROM giohang WHERE id_tk = '$id_tk'");
    echo'
      <script> 
        alert("Cảm ơn bạn đã mua sản phẩm của chúng tôi! \nHẹn gặp lại quý khách!");
        location.replace("index.php?layout=home"); 
      </script>
    ';
  }
  
  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thanh toán</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
    <!-- Bootstrap core CSS -->
    <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <!-- <link href="form-validation.css" rel="stylesheet"> -->
  </head>
  <body class="bg-light">
    <div class="container mt-1">
      <div class="row mt-2">
        <div class="col-md-7 text-gray-900">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-dark text-uppercase">Giỏ hàng của bạn</span>
            <span class="badge badge-pill badge-primary"><?php echo $count ?></span>
          </h4>
          <table class="table table-responsive-sm text-gray-900">
            <thead>
              <tr class="text-center">
                <th scope="col" class="col-md-1">Hình ảnh</th>
                <th scope="col" class="col-md-3">Tên sản phẩm</th>
                <th scope="col" class="col-md-1">Số lượng</th>
                <th scope="col" class="col-md-2">Thành tiền</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $tatol = null;
                while($row = mysqli_fetch_array($truyvan)){
                  $tatol += $row['thanh_tien'];
                  echo'
                    <tr>
                      <td scope="row" class="text-center"><img src="./admin/images/'.$row['hinh_anh'].'" alt="product photo" class="header-cart-item__img"></td>
                      <td class="text-center">'.$row['ten_sp'].'</td>
                      <td class="text-center">'.$row['so_luong'].'</td>
                      <td class="text-end">'.number_format($row['thanh_tien']).' <sup><u>đ</u></sup></td>
                    </tr>
                  ';
                }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="2">Tạm tính</td>
                <td colspan="2" class="text-end"><?php echo number_format($tatol) ?> <sup><u>đ</u></sup></td>
              </tr>
              <tr>
                <td colspan="2">Phí vận chuyển</td>
                <td colspan="2" class="text-end">—</td>
              </tr>
              <tr>
                <td colspan="2">Tổng cộng</td>
                <td colspan="2" class="text-end h5 text-danger font-weight-bolder"><?php echo number_format($tatol) ?> VNĐ</td>
              </tr>
            </tfoot>
          </table>

        </div>
        <div class="col-md-5 text-gray-900 border-left pl-5">
          <h4 class="mb-3 text-uppercase">Thông tin giao hàng</h4>
          <form class="needs-validation" method="post" novalidate>
            <div class="row">
              <div class="col">
                <label for="firstName">Họ tên <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="firstName" placeholder="Họ và tên" value="<?php echo $row_user['ho_ten'] ?>" required >  
                <div class="invalid-feedback">
                  Vui lòng nhập họ tên !!!
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="address" class="mt-1">Số điện thoại <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="address" placeholder="0764214958" value="<?php echo $row_user['sdt'] ?>" required >
                <div class="invalid-feedback">
                  Vui lòng nhập số điện thoại !!!
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="email" class="mt-1">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com" value="<?php echo $row_user['email'] ?>" required >
                <div class="invalid-feedback">
                  Vui lòng nhập địa chỉ Email !!!
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="address" class="mt-1">Địa chỉ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="address" name="diachi" placeholder="11 Mậu Thân, Xuân Khánh, Ninh Kiều, Cần Thơ" value="<?php echo $row_user['dia_chi'] ?>" required>
                <div class="invalid-feedback">
                  Vui lòng nhập địa chỉ !!!
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="ghichu" class="mt-1">Ghi chú (nếu có)</label>
                <textarea name="ghichu" id="ghichu" cols="30" rows="5" class="form-control" ></textarea>

              </div>
            </div>
            <!-- <div class="row form-group">
              <div class="col-md-4 mb-3">
                <label for="country">Tỉnh / Thành phố</label>
                <select class="form-select form-select-sm mb-3 form-control custom-select" id="city" name="tinh" aria-label=".form-select-sm" required>
                  <option value="" selected>Chọn tỉnh thành</option>           
                </select>
                <div class="invalid-feedback">
                  Vui lòng chọn Tỉnh / Thành phố !!!
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Quận / Huyện</label>
                <select class="form-select form-select-sm mb-3 form-control custom-select" id="district" aria-label=".form-select-sm" required>
                  <option value="" selected>Chọn quận huyện</option>
                </select>
                <div class="invalid-feedback">
                  Vui lòng chọn Quận / Huyện !!!
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Phường / Xã </label>
                <select class="form-select form-select-sm mb-3 form-control custom-select" id="ward" aria-label=".form-select-sm" required>
                  <option value="" selected>Chọn phường xã</option>
                </select>
                <div class="invalid-feedback">
                  Vui lòng chọn Quận / Huyện !!!
                </div>
              </div>
            </div> -->
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address" checked>
              <label class="custom-control-label" for="same-address">Địa chỉ vận chuyển giống như địa chỉ thanh toán của tôi.</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info" checked>
              <label class="custom-control-label" for="save-info">Lưu thông tin cho lần mua sau.</label>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary d-grid gap-2" type="submit" name="submit" >Tiến hành thanh toán</button>
          </form>
        </div>
      </div>
    </div>
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/4.3/examples/checkout/form-validation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- <script src="app.js"></script> -->
    <script>
      var citis = document.getElementById("city");
      var districts = document.getElementById("district");
      var wards = document.getElementById("ward");
      var Parameter = {
        url: "./pages/giohang/data/vietnam.json", //Đường dẫn đến file chứa dữ liệu hoặc api do backend cung cấp
        method: "GET", //do backend cung cấp
        responseType: "application/json", //kiểu Dữ liệu trả về do backend cung cấp
      };
      //gọi ajax = axios => nó trả về cho chúng ta là một promise
      var promise = axios(Parameter);
      //Xử lý khi request thành công
      promise.then(function (result) {
        renderCity(result.data);
      });

      function renderCity(data) {
        for (const x of data) {
          citis.options[citis.options.length] = new Option(x.Name, x.Id);
        }

        // xứ lý khi thay đổi tỉnh thành thì sẽ hiển thị ra quận huyện thuộc tỉnh thành đó
        citis.onchange = function () {
          district.length = 1;
          ward.length = 1;
          if(this.value != ""){
            const result = data.filter(n => n.Id === this.value);

            for (const k of result[0].Districts) {
              district.options[district.options.length] = new Option(k.Name, k.Id);
            }
          }
        };

        // xứ lý khi thay đổi quận huyện thì sẽ hiển thị ra phường xã thuộc quận huyện đó
        district.onchange = function () {
          ward.length = 1;
          const dataCity = data.filter((n) => n.Id === citis.value);
          if (this.value != "") {
            const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

            for (const w of dataWards) {
              wards.options[wards.options.length] = new Option(w.Name, w.Id);
            }
          }
        };
      }
    </script>

</body>
</html>