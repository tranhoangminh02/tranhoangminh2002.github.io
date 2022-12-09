<style>
    .card-body, .table{
        color: #000 !important;
    }
</style>

<?php
    $id = $_GET['id'];
    $date = $_GET['date'];
    $query = mysqli_query($conn,"SELECT * FROM dondathang WHERE id_tk = '$id' AND ngaythanhtoan = '$date'");
    $query_ = mysqli_query($conn,"SELECT * FROM dondathang WHERE id_tk = '$id' AND ngaythanhtoan = '$date'");
    $row_ = mysqli_fetch_array($query_);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<!-- <h1 class="panel-title font-weight-bolder text-dark">CHI TIẾT ĐƠN ĐẶT HÀNG</h1> -->
<div class="card shadow mb-4 text-dark">
    <div class="card-body text-dark font-weight-normal" id="div_print">
        <h4>CỬA HÀNG CÔNG NGHỆ MTT.TECH</h4>
        <div>Hẻm 11, Mậu Thân, Xuân Khánh, Ninh Kiều, TP. Cần Thơ</div>
        <div>ĐT: 0764 214 958 - 0372 568 414</div>
        <div><a href="https://hoangminhdev.tech">https://thietbicongnghe.com.vn</a></div>
        <hr>
        <h2 class="text-center">ĐƠN ĐẶT HÀNG</h2>
        <div class="text-center">Ngày lập phiếu: <?php echo date('d/m/Y') ?></div>
        <div class="row">
            <div class="col-6"><span class="font-weight-bold">Tên khách hàng: </span><?php echo $row_['hoten'] ?></div>
            <div class="col-6"><span class="font-weight-bold">Ngày giờ in: </span><?php echo date('d/m/Y H:i:s A') ?></div>
        </div>
        <div class="row">
            <div class="col-6"><span class="font-weight-bold">Địa chỉ: </span><?php echo $row_['diachi'] ?></div>
            <div class="col-6"><span class="font-weight-bold">Số điện thoại: </span><?php echo $row_['sdt'] ?></div>
        </div>
        <div class="row">
            <div class="col-6"><span class="font-weight-bold">Hình thức thanh toán:</span> Tiền mặt</div>
            <div class="col-6"><span class="font-weight-bold">Kho hàng:</span> Ninh Kiều, Cần Thơ</div>
        </div>
        <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
            <table class="table table-bordered text-dark" width="100%" cellspacing="0" >
                <thead class="text-center align-middle">
                    <th>STT</th>
                    <th>Tên hàng</th>
                    <th>Đơn vị</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thuế</th>
                    <th>Thành tiền</th>
                </thead>
                <?php
                    $stt = 0;
                    $tongtien = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $stt++;
                        $thanhtien = ($row['soluong']*$row['dongia']);
                        $tongtien += $thanhtien;
                        echo '
                        <tr>
                            <td class="text-center align-middle">' . $stt . '</td>
                            <td class="text-center align-middle">' . $row['tensanpham'] . '</td>
                            <td class="text-center align-middle">Cái</td>
                            <td class="text-center align-middle">' . $row['soluong'] . '</td>
                            <td class="text-right align-middle">' . number_format($row['dongia']) . '</td>
                            <td class="text-center align-middle"></td>
                            <td class="align-middle text-right">' . number_format($thanhtien) . '</td>
                        </tr>
                        ';
                    }
                ?>
            </table>
            <div class="row">
                <div class="col-9 text-right font-weight-bold">Tổng tiền hàng (Tạm tính):</div>
                <div class="col-3 text-right"><?php echo number_format($tongtien)." VNĐ" ?></div>
            </div>
            <div class="row">
                <div class="col-9 text-right font-weight-bold">Tiền thuế GTGT:</div>
                <div class="col-3 text-right">0</div>
            </div>
            <div class="row">
                <div class="col-9 text-right font-weight-bold">TỔNG TIỀN:</div>
                <div class="col-3 text-right text-danger font-weight-bold"><?php echo number_format($tongtien)." VNĐ" ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-6 text-dark font-weight-bold text-center">Người lập</div>
                <div class="col-6 text-dark font-weight-bold text-center">Khách hàng</div>
            </div>
            <div class="row">
                <div class="col-6 text-center">Trần Hoàng Minh</div>
                <div class="col-6 text-center"><?php echo $row_['hoten'] ?></div>
            </div>
        </div>
    </div>
    <input name="b_print" type="button" class="ipt btn btn-success" onClick="printdiv('div_print');" value="IN HOÁ ĐƠN">

</div>

<!-- BUtton in hoá đơn -->
<script language="javascript">
    function printdiv(printpage) {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
        var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr + newstr + footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }
</script>