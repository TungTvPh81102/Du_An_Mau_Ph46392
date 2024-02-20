<div class="container">
    <div class="row mb-3">
        <div class="col-9">
            <?php if (isset($donHang) && is_array($donHang)) {
            } ?>
            <div class="box-title">Cảm ơn</div>
            <div class="box-content mb-3 text-center"><strong>Cảm ơn quý khách đã đặt hàng !</strong></div>
            <div class="box-title">Mã vận đơn</div>
            <div class="box-content mb-3 text-center">DUAMAU<?= $donHang['id_bill'] ?></div>
            <div class="box-title">Thông tin giao hàng</div>
            <div class="box-content mb-3 d-flex flex-column">
                <span class="pb-3"><strong>Người đặt hàng:</strong> <?= $donHang['bill_name'] ?></span>
                <span class="pb-3"><strong>Địa chỉ giao hàng:</strong> <?= $donHang['bill_address'] ?></span>
                <span class="pb-3"><strong>Email:</strong> <?= $donHang['bill_email'] ?></span>
                <span class="pb-3"><strong>Số điện thoại:</strong> <?= $donHang['bill_tel'] ?></span>
                <span class="pb-3"><strong>Ngày đặt hàng:</strong> <?= $donHang['ngay_dat'] ?></span>
            </div>
            <div class="box-title">Phương thức thanh toán</div>
            <div class="box-content mb-3">
                <?= $pttt ?>
            </div>
            <div class="box-title">Thông tin giỏ hàng</div>
            <div class="box-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tong = 0;
                        foreach ($chiTietDonHang as $donHang) :
                            $tong += $donHang['thanh_tien'];
                        ?>
                        <tr>
                            <td style="width: 300px;"><?= $donHang['ten_sp'] ?></td>
                            <td>
                                <img style="width: 70px;" src="../../upload/<?= $donHang['hinh'] ?>" alt="">
                            </td>
                            <td><?= number_format($donHang['gia'], 0) ?></td>
                            <td><?= $donHang['so_luong'] ?></td>
                            <td><?= number_format($donHang['thanh_tien'], 0) ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <td colspan="4" class="fw-bold">Tổng thanh toán</td>
                        <td><?= number_format($tong, 0) ?></td>
                    </tbody>
                </table>
            </div>
        </div>
        <?php include "./layout/boxRight.php" ?>
    </div>
</div>