<div class="container">
    <div class="row mb-3">
        <div class="col-9">
            <form action="index.php?act=bill-confirm" method="post">
                <?php if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                    $hoTen = $_SESSION['user']['ho_ten'];
                    $diaChi = $_SESSION['user']['dia_chi'];
                    $soDt = $_SESSION['user']['so_dt'];
                    $email = $_SESSION['user']['email'];
                    $maKh = $_SESSION['user']['ma_kh'];
                } else {
                    $hoTen = "";
                    $diaChi = "";
                    $soDt = "";
                    $email = "";
                    $maKh = '';
                }
                ?>
                <div class="box-title">Thông tin khách hàng</div>
                <div class="box-content mb-3">
                    <!-- <input type="hidden" name="ma_kh" value="<?= $maKh ?>"> -->
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Người đặt hàng</label>
                        <div class="col-sm-10">
                            <input name="ho_ten" type="text" class="form-control" id="inputEmail3" value="<?= $hoTen ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputtext3" class="col-sm-2 col-form-label">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input name="dia_chi" type="text" class="form-control" id="inputtext3" value="<?= $diaChi  ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputtext3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input name="email" type="email" class="form-control" id="inputtext3" value="<?= $email ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputtext3" class="col-sm-2 col-form-label">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input name="so_dt" type="text" class="form-control" id="inputtext3" value="<?= $soDt ?>">
                        </div>
                    </div>
                </div>
                <div class="box-title">Phương thức thanh toán</div>

                <div class="box-content mb-3">
                    <div class="form-check form-check-inline">
                        <input name="pttt" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" checked>
                        <label class="form-check-label" for="inlineCheckbox1">Trả tiền khi nhận hàng</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="pttt" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2">
                        <label class="form-check-label" for="inlineCheckbox2">Chuyển khoản ngân hàng</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="pttt" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3">
                        <label class="form-check-label" for="inlineCheckbox2">Thanh toán Online</label>
                    </div>
                </div>

                <div class="box-title">Thông tin giỏ hàng</div>
                <div class="box-content mb-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['my_cart'])) {
                                viewCart(2);
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <input class="btn btn-primary" type="submit" name="dat-hang" id="" value="Thanh toán">
                <a class="btn btn-success" href="index.php?act=san-pham">Tiếp tục đặt hàng</a>
            </form>
        </div>
        <?php include "./layout/boxRight.php" ?>
    </div>
</div>