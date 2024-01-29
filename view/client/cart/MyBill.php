<div class="container">
    <div class="row mb-3">
        <div class="col-9">
            <div class="box-title">Đơn hàng của tôi</div>
            <div class="box-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tong = 0;
                        foreach ($loadMyBill as $myBill) :
                            $thanhTien = $myBill['so_luong'] * $myBill['gia'];
                            $tong += $thanhTien;
                        ?>
                            <tr>
                                <td><?= $myBill['id_bill'] ?></td>
                                <td><?= $myBill['ten_sp'] ?></td>
                                <td><?= number_format($myBill['gia'], 0) ?></td>
                                <td>
                                    <img style="width: 70px;" src="../../upload/<?= $myBill['hinh'] ?>" alt="">
                                </td>
                                <td><?= $myBill['so_luong'] ?></td>
                                <td><?= number_format($myBill['thanh_tien'], 0) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td>Thành tiền</td>
                            <td colspan="5"><?= number_format($tong, 0) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php include "layout/boxRight.php" ?>
    </div>
</div>